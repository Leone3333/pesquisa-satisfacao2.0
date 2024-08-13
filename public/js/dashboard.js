let list = document.querySelector(".nav-links");
let sideBar = document.querySelector(".sideBar");
let aText = document.querySelectorAll(".link-text");

console.log(list);
console.log(sideBar);
console.log(aText);

list.addEventListener("mouseover", () => {
    sideBar.classList.add("wide");
    for (let index = 0; index < aText.length; index++) {
        aText[index].classList.add("visible");
    }
});

list.addEventListener("mouseout", () => {
    sideBar.classList.remove("wide");
    for (let index = 0; index < aText.length; index++) {
        aText[index].classList.remove("visible");
    }
});



