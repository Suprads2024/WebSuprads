// Encapsulamos la lógica en una función
function animateStatistics() {
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
    animateCircles(); // Ejecutar al inicio
}

// Ejecutar al cargar la página inicialmente
document.addEventListener("DOMContentLoaded", animateStatistics);

// Ejecutar después de cada navegación con Swup
document.addEventListener("swup:contentReplaced", animateStatistics);
