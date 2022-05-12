const nav = document.querySelector(".side-nav");
const aside = document.querySelector(".aside");
const menuBtns = document.querySelectorAll(".menu-button");
const hasChildren = document.querySelectorAll(".menu-item-has-children");
const closer = document.querySelector(".nav-closer");

menuBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        nav.classList.toggle("open");
    })
})

aside.addEventListener("click", () => {
    nav.classList.toggle("open");
})

function subMenuOpen() {
  let subMenu = this.previousElementSibling;
  subMenu.classList.toggle("open");
}


let icon = document.createElement("i");
icon.classList.add("fa-solid", "fa-plus");

hasChildren.forEach(child => {
    child.append(icon);
    icon.addEventListener("click", subMenuOpen);
})



