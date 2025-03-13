const rangeInput = document.querySelectorAll(".range-input input"),
    progress = document.querySelector(".slider .progress"),
    startAge = document.querySelector(".start-age"),
    finishAge = document.querySelector(".finish-age")
    ;

let ageGap = 1;

// Ambil nilai dari URL atau set default
const urlParams = new URLSearchParams(window.location.search);
const minAgeValue = urlParams.get("minAge") ? parseInt(urlParams.get("minAge")) : 1;
const maxAgeValue = urlParams.get("maxAge") ? parseInt(urlParams.get("maxAge")) : 4;

rangeInput[0].value = minAgeValue;
rangeInput[1].value = maxAgeValue;

updateLabelsAndHref();

progress.style.left = (rangeInput[0].value / rangeInput[0].max) * 100 + "%";
progress.style.right =
    100 - (rangeInput[1].value / rangeInput[1].max) * 100 + "%";


rangeInput.forEach((input) => {
    input.addEventListener("input", (e) => {
        let minVal = parseInt(rangeInput[0].value),
            maxVal = parseInt(rangeInput[1].value);

        if (maxVal - minVal < ageGap) {
            if (e.target.className === "range-min") {
                rangeInput[0].value = maxVal - ageGap;
            } else {
                rangeInput[1].value = minVal + ageGap;
            }
        } else {
            progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
            progress.style.right =
                100 - (maxVal / rangeInput[1].max) * 100 + "%";

            updateLabelsAndHref();
        }
    });
});

function updateLabelsAndHref() {
    startAge.textContent = rangeInput[0].value;
    finishAge.textContent = rangeInput[1].value;
}
