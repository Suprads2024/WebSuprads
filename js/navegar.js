// Para menú de escritorio
document.querySelectorAll(".mil-onepage-nav a").forEach(link => {
    link.addEventListener("click", function (event) {
        const href = this.getAttribute("href");

        if (href.startsWith("#")) {
            event.preventDefault();
            document.querySelector(href)?.scrollIntoView({ behavior: "smooth" });
        } else if (href && href !== "#") {
            window.location.href = href;
        }
    });
});

// Para menú móvil
document.querySelectorAll(".mil-main-menu a").forEach(link => {
    link.addEventListener("click", function (event) {
        const href = this.getAttribute("href");

        if (href.startsWith("#")) {
            event.preventDefault();
            document.querySelector(href)?.scrollIntoView({ behavior: "smooth" });
        } else if (href && href !== "#") {
            window.location.href = href;
        }
    });
});
