document.addEventListener("DOMContentLoaded", () => {
    document.addEventListener("scroll", () => {
        const footer = document.querySelector("footer");
        if (footer) {
            if (window.scrollY > 50) {
                footer.classList.add("shrink");
            } else {
                footer.classList.remove("shrink");
            }
        }
    });
});
