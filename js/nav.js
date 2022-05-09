const nav = document.querySelector(".side-nav");

const menuBtns = document.querySelectorAll(".menu-button");

const closer = document.querySelector(".nav-closer");

menuBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        nav.classList.toggle("open");

    })
})