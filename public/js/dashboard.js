let list = document.querySelector(".nav-links");
let sideBar = document.querySelector(".sideBar");

console.log(list);
console.log(sideBar);

list.addEventListener("mouseover", () => {
    sideBar.classList.add("wide");
});

list.addEventListener("mouseout", () => {
    sideBar.classList.remove("wide");
});



