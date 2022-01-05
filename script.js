// prikazivanje forme za dodavanje novog kursa

$("#novi-kurs").click(function (e) {
    e.preventDefault();
    $(".prozor-kurs").toggleClass("hidden-kurs");
});

// obrada dodavanja novog kursa

$("#dodajNovi").submit(function (e) {
    e.preventDefault();
    console.log("Dodavanje");
    const $form = $(this);
    const $input = $form.find('input, textarea, button, select');
    const podaci = $form.serialize();
    $input.prop('disabled', true);

    let request = $.ajax({
        url: 'controller/dodaj.php',
        type: 'POST',
        data: podaci
    });

    request.done(function (response) {
        if (response === 'Success') {
            alert("Novi kurs je uspešno dodat.");
            location.reload(true);
        } else {
            console.log("Novi kurs nije dodat. " + response);
        }
    });

    request.fail(function () {
        console.error("Desila se greska.");
    });

});

// obrada brisanja postojeceg kursa

$(".obrisi-kurs-button").click(function (e) {
    e.preventDefault();

    let id = $(this).data('id');

    let td = $("#" + id).closest('tr');

    let request = $.ajax({
        url: 'controller/izbrisi.php',
        type: 'post',
        data: {
            id: id
        }
    });

    request.done(function (response) {
        if (response === 'Success') {
            td.remove();
            alert("Kurs je obrisan.");
            location.reload(true);
        } else {
            console.log("Kurs nije obrisan.");
        }
    });
});

// prikazivanje forme za izmenu kursa

$(".izmeni-kurs-button").click(function () {
    $(".izmeni-kurs").toggleClass("hidden-kurs");
    let id = $(this).data('id');
    let naziv = $("#" + id).children("td[data-target=naziv]").text();
    let opis = $("#" + id).children("td[data-target=opis]").text();
    let autor = $("#" + id).children("td[data-target=autor]").text();

    $("#id-input").val(id);
    $("#naziv-input").val(naziv);
    $("#opis-input").val(opis);
    $("#autor-input").val(autor);
});

// update fja

$("#btnIzmeni").click(function (e) {
    e.preventDefault();
    let id = $("#id-input").val();
    let naziv = $("#naziv-input").val();
    let opis = $("#opis-input").val();
    let autor = $("#autor-input").val();

    let request = $.ajax({
        url: 'controller/izmeni.php',
        type: 'post',
        data: {
            id: id,
            naziv: naziv,
            opis: opis,
            autor: autor
        }
    });

    request.done(function (response) {
        if (response === 'Success') {
            alert("Kurs je izmenjen.");
            location.reload(true);
        }
    });
});

// pretrazivanje kurseva

$("#search").on('keyup', function (i) {
    let kriterijum = $(this).val().toLowerCase();

    $("table tr").each(function (i) {
        if (i != 0) {
            let red = $(this);
            if (red.text().toLowerCase().indexOf(kriterijum) <= -1) {
                red.hide();
            } else {
                red.show();
            }
        }
    });

});

// sortiranje tabele

function sortiraj() {
    let tabela = document.querySelector(".table");
    let redovi = tabela.rows;

    console.log("Pokrenuta funkcija za sortiranje."); // provera

    let menjaj = true;
    let promena;
    let x, y, i;
    let brojac = 0;
    let redosled = "asc";
    while (menjaj) {
        menjaj = false;
        for (i = 1; i < (redovi.length - 1); i++) {
            promena = false;
            x = redovi[i].getElementsByTagName("td")[1];
            y = redovi[i + 1].getElementsByTagName("td")[1];
            if (redosled == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    promena = true;
                    break;
                }
            } else if (redosled == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    promena = true;
                    break;
                }
            }
        }
        if (promena) {
            redovi[i].parentNode.insertBefore(redovi[i + 1], redovi[i]);
            menjaj = true;
            brojac++;
        } else {
            if (brojac == 0 && redosled == "asc") {
                redosled = "desc";
                menjaj = true;
            }
        }
    }
}

$("#sortiraj").click(function (e) {
    e.preventDefault();
    sortiraj();
});