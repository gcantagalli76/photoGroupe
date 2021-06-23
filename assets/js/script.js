function cls(el) {
    return document.getElementsByClassName(el)[0];
}

cls("gallery-preview-picture").addEventListener("click", function () {
    this.classList.toggle("zoomed")
    let width = 0
    let height = 0
    if (window.innerHeight > window.innerWidth) {
        this.classList.remove("full-w")
        this.classList.add("full-h")
        height = +getComputedStyle(this).height.slice(0, -2)
        width = +getComputedStyle(this).width.slice(0, -2)
        scrollTo((width - window.innerWidth) / 2, 0)
    } else {
        this.classList.remove("full-h")
        this.classList.add("full-w")
        height = +getComputedStyle(this).height.slice(0, -2)
        width = +getComputedStyle(this).width.slice(0, -2)
        scrollTo(0, (height - window.innerHeight) / 2)
    }
})