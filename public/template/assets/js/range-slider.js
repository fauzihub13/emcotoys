const minRange = document.querySelector(".min-range");
const maxRange = document.querySelector(".max-range");
const minValue = document.getElementById("min-value");
const maxValue = document.getElementById("max-value");
const sliderHighlight = document.getElementById("slider-highlight");

minRange.addEventListener("input", updateValues);
maxRange.addEventListener("input", updateValues);

function updateValues() {
    let minVal = parseInt(minRange.value);
    let maxVal = parseInt(maxRange.value);

    if (minVal >= maxVal - 500) {
        minRange.value = maxVal - 500;
        minVal = maxVal - 500;
    }

    if (maxVal <= minVal + 500) {
        maxRange.value = minVal + 500;
        maxVal = minVal + 500;
    }

    minValue.textContent = minVal;
    maxValue.textContent = maxVal;

    // Update warna hijau di slider
    let minPercent = (minVal / 10000) * 100;
    let maxPercent = (maxVal / 10000) * 100;
    sliderHighlight.style.left = minPercent + "%";
    sliderHighlight.style.width = maxPercent - minPercent + "%";
}

// Set warna hijau awal
updateValues();
