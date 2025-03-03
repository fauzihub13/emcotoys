document.addEventListener("DOMContentLoaded", () => {
    const imageInput = document.getElementById("imageInput");
    if (imageInput) {
        imageInput.addEventListener("change", function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const thumbnail = document.getElementById("thumbnail");
                    if (thumbnail) {
                        thumbnail.src = e.target.result;
                    }
                };
                reader.readAsDataURL(file);
            }
        });
    }

    const uploadContainer = document.getElementById("uploadContainer");
    const imageUploadInput = document.getElementById("imageUpload");
    const hiddenInputsContainer = document.getElementById("hiddenInputs");

    let selectedFiles = new DataTransfer();

    if (uploadContainer) {
        imageUploadInput.addEventListener("change", function (event) {
            const files = Array.from(event.target.files);
            const currentImages =
                uploadContainer.querySelectorAll(".image-preview").length;

            if (currentImages + files.length > 10) {
                return;
            }

            files.forEach((file) => {
                if (!file.type.startsWith("image/")) return;

                let reader = new FileReader();
                reader.onload = function (e) {
                    addImage(e.target.result, file);
                    selectedFiles.items.add(file);
                    updateHiddenInputs();
                    checkUploadBox();
                };
                reader.readAsDataURL(file);
            });

            event.target.value = "";
        });

        // Remove Image Button
        uploadContainer.addEventListener("click", function (event) {
            if (event.target.classList.contains("remove-btn")) {
                event.preventDefault();
                event.stopPropagation();

                let colElement = event.target.closest(
                    ".col-6, .col-md-4, .col-lg-3"
                );

                if (colElement) {
                    let imageName = colElement.getAttribute("data-filename"); // Get file name
                    colElement.remove();

                    // Remove from DataTransfer
                    let newDataTransfer = new DataTransfer();
                    for (let i = 0; i < selectedFiles.files.length; i++) {
                        if (selectedFiles.files[i].name !== imageName) {
                            newDataTransfer.items.add(selectedFiles.files[i]);
                        }
                    }
                    selectedFiles = newDataTransfer; // Update selectedFiles

                    updateHiddenInputs();
                    checkUploadBox();
                }
            }
        });

        function addImage(imageSrc, file) {
            let colDiv = document.createElement("div");
            colDiv.classList.add("col-6", "col-md-4", "col-lg-3");
            colDiv.setAttribute("data-filename", file.name); // Store filename for removal

            let previewBox = document.createElement("div");
            previewBox.classList.add("image-preview");
            previewBox.style.backgroundImage = `url(${imageSrc})`;

            let removeBtn = document.createElement("button");
            removeBtn.innerHTML = "&times;";
            removeBtn.classList.add("remove-btn");
            removeBtn.setAttribute("aria-label", "Remove image");
            removeBtn.type = "button";

            previewBox.appendChild(removeBtn);
            colDiv.appendChild(previewBox);
            uploadContainer.insertBefore(
                colDiv,
                document.querySelector(".upload-box")?.parentElement
            );
        }

        function checkUploadBox() {
            const currentImages =
                uploadContainer.querySelectorAll(".image-preview").length;
            let uploadBoxWrapper =
                document.querySelector(".upload-box")?.parentElement;

            if (currentImages >= 10) {
                if (uploadBoxWrapper) uploadBoxWrapper.remove();
            } else {
                if (!uploadBoxWrapper) restoreUploadBox();
            }
        }

        function restoreUploadBox() {
            let colDiv = document.createElement("div");
            colDiv.classList.add("col-6", "col-md-4", "col-lg-3");

            let uploadBox = document.createElement("label");
            uploadBox.classList.add("upload-box");

            let icon = document.createElement("i");
            icon.classList.add("bi-plus-lg");

            let input = document.createElement("input");
            input.type = "file";
            input.accept = ".jpg, .jpeg, .png";
            input.multiple = true;
            input.id = "imageUpload";

            input.addEventListener("change", function (event) {
                const files = Array.from(event.target.files);
                const currentImages =
                    uploadContainer.querySelectorAll(".image-preview").length;

                if (currentImages + files.length > 10) return;

                files.forEach((file) => {
                    if (!file.type.startsWith("image/")) return;

                    let reader = new FileReader();
                    reader.onload = function (e) {
                        addImage(e.target.result, file);
                        selectedFiles.items.add(file);
                        updateHiddenInputs();
                        checkUploadBox();
                    };
                    reader.readAsDataURL(file);
                });

                event.target.value = "";
            });

            uploadBox.appendChild(icon);
            uploadBox.appendChild(input);
            colDiv.appendChild(uploadBox);
            uploadContainer.appendChild(colDiv);
        }

        function updateHiddenInputs() {
            hiddenInputsContainer.innerHTML = "";
            let newInput = document.createElement("input");
            newInput.type = "file";
            newInput.name = "images[]";
            newInput.multiple = true;
            newInput.files = selectedFiles.files;
            hiddenInputsContainer.appendChild(newInput);
        }
    }
});
