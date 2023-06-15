let rangeMin = 10;
const rangerBars = document.querySelectorAll(".range-selected");
const rangeInput = document.querySelectorAll(".range-input input");
const rangePrice = document.querySelectorAll(".range-price input");
const rangeClearBtn = document.querySelectorAll(".rangeClear");
if (!localStorage.minPrice || !localStorage.maxPrice) {
    localStorage.minPrice = 0;
    localStorage.maxPrice = 300000;
}
if (localStorage.minPrice != null || localStorage.maxPrice != null) {
    rangeInput.forEach((input) => {
        if (input.classList.contains("min")) {
            input.value = localStorage.minPrice;
        } else {
            input.value = localStorage.maxPrice;
        }
    });
    rangePrice.forEach((input) => {
        if (input.classList.contains("min")) {
            input.value = localStorage.minPrice;
        } else {
            input.value = localStorage.maxPrice;
        }
    });
    rangerBars.forEach((range) => {
        range.style.left =
            (rangeInput[0].value / rangeInput[0].max) * 100 + "%";
        range.style.right =
            100 - (rangeInput[1].value / rangeInput[1].max) * 100 + "%";
    });
}

rangeInput.forEach((input) => {
    input.addEventListener("input", (e) => {
        var maxRange;
        var minRange;
        if (e.target.classList.contains("max")) {
            maxRange = parseInt(e.target.value);
        } else {
            minRange = parseInt(e.target.value);
        }
        if (maxRange - minRange < rangeMin) {
            if (e.target.className === "min") {
                rangeInput[0].value = maxRange - rangeMin;
            } else {
                rangeInput[1].value = minRange + rangeMin;
            }
        } else {
            rangePrice[0].value = minRange;
            rangePrice[1].value = maxRange;
            rangerBars.forEach((range) => {
                range.style.left = (minRange / rangeInput[0].max) * 100 + "%";
                range.style.right =
                    100 - (maxRange / rangeInput[1].max) * 100 + "%";
            });
            if (minRange != null) {
                localStorage.minPrice = minRange;
            }
            if (maxRange != null) {
                localStorage.maxPrice = maxRange;
            }
        }

        location.reload();
    });
});
rangePrice.forEach((input) => {
    input.addEventListener("input", (e) => {
        var minPrice;
        var maxPrice;
        if (e.target.classList.contains("min")) {
            minPrice = e.target.value;
        } else {
            maxPrice = e.target.value;
        }
        // if (maxPrice - minPrice >= rangeMin && maxPrice <= rangeInput[1].max) {
        if (e.target.className === "min") {
            rangeInput[0].value = minPrice;
            console.log(e.target);
            // rangerBars.forEach((range) => {
            //     range.style.left =
            //         (minPrice / rangeInput[0].max) * 100 + "%";
            // });
        } else {
            rangeInput[1].value = maxPrice;
            rangerBars.forEach((range) => {
                range.style.right =
                    100 - (maxPrice / rangeInput[1].max) * 100 + "%";
            });
        }
        // }
        if (minPrice != null) {
            localStorage.minPrice = minPrice;
        }
        if (maxPrice != null) {
            localStorage.maxPrice = maxPrice;
        }
        location.reload();
    });
});

rangeClearBtn.forEach((input) => {
    input.addEventListener("click", function () {
        localStorage.minPrice = 0;
        localStorage.maxPrice = 300000;
        location.reload();
    });
});
