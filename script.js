$("#novi-kurs").click(function (e) {
    e.preventDefault();
    $(".prozor-kurs").toggleClass("hidden-kurs");
});

$("#dodajNovi").submit(function (e) {
    e.preventDefault();
    console.log("Dodavanje");
});