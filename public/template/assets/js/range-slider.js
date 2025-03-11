const rangeInput = document.querySelectorAll(".range-input input"),
    progress = document.querySelector(".slider .progress"),
    startAge = document.querySelector(".start-age"),
    finishAge = document.querySelector(".finish-age"),
    applyButton = document.querySelector(".age-input");

let ageGap = 1;

rangeInput[0].value = 1;
rangeInput[1].value = 4;

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
    applyButton.href = `?start=${rangeInput[0].value}&finish=${rangeInput[1].value}`;
}
