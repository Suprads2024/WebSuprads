document.addEventListener("DOMContentLoaded", function () {
    const stats = document.querySelectorAll(".stat");

    function isElementInViewport(el) {
        const rect = el.getBoundingClientRect();
        return rect.top < window.innerHeight * 0.75;
    }

    function animateCircles() {
        stats.forEach(stat => {
            let circle = stat.querySelector(".circle");
            let percentageElement = stat.querySelector(".percentage");
            let targetValue = parseInt(circle.getAttribute("data-value"), 10);

            if (isElementInViewport(stat) && !circle.classList.contains("filled")) {
                circle.classList.add("filled");

                let currentValue = 0;

                function updateCircle() {
                    if (currentValue <= targetValue) {
                        percentageElement.textContent = currentValue + "%";
                        let angle = (360 * currentValue) / 100;
                        circle.style.background = `conic-gradient(#7f7cfd ${angle}deg, #ddd ${angle}deg)`;

                        currentValue++;
                        requestAnimationFrame(updateCircle);
                    }
                }

                updateCircle();
            }
        });
    }

    window.addEventListener("scroll", animateCircles);
    animateCircles(); // Para ejecutar al inicio
});
