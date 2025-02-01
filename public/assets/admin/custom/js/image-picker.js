
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
