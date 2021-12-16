let btnNovi = document.querySelector("#novi-kurs");
let noviProzor = document.querySelector(".prozor-kurs");

btnNovi.addEventListener("click", function () {
    noviProzor.classList.toggle("hidden-kurs");
    console.log("hello");
})