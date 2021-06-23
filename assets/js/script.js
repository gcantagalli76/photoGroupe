function cls(el) {
    return document.getElementsByClassName(el)[0];
}

cls("gallery-preview-picture").addEventListener("click", function () {
    document.
        this.classList.toggle("zoomed");
    const auto = "auto"
    const fill = "100vmax"
    if (window.innerHeight > window.innerWidth) {
        this.style.width = fill
        this.stlye.height = auto
    } else {
        this.style.width = auto
        this.style.height = fill
    }
})