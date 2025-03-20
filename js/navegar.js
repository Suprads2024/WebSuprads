document.querySelectorAll(".mil-onepage-nav a").forEach(link => {
    link.addEventListener("click", function (event) {
        const href = this.getAttribute("href");

        // Si el enlace es un ancla interno, hacer scroll suave
        if (href.startsWith("#")) {
            event.preventDefault();
            document.querySelector(href)?.scrollIntoView({ behavior: "smooth" });
        } 
        // Si es una URL normal, forzar la navegación
        else if (href && href !== "#") {
            window.location.href = href;
        }
    });
});
