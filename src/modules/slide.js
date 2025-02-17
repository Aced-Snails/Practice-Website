document.addEventListener("DOMContentLoaded", function () {
    const slider = document.querySelector(".location-slider");
    const items = document.querySelectorAll(".location-item");
    const nextBtn = document.getElementById("next");
    const prevBtn = document.getElementById("prev");
    let index = 0;

    function updateSlider() {
        slider.style.transform = `translateX(-${index * 100}%)`;
    }

    nextBtn.addEventListener("click", function () {
        if (index < items.length - 1) {
            index++;
        } else {
            index = 0;
        }
        updateSlider();
    });

    prevBtn.addEventListener("click", function () {
        if (index > 0) {
            index--;
        } else {
            index = items.length - 1;
        }
        updateSlider();
    });
});