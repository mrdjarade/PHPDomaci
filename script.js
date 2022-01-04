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
    const serijalizacija = $form.serialize();
    console.log(serijalizacija);
    $input.prop('disabled', true);

    request = $.ajax({
        url: 'controller/dodaj.php',
        type: 'POST',
        data: serijalizacija
    });

    request.done(function (res, textStatus, jqXHR) {
        if (res === 'Success') {
            alert("Novi kurs je uspešno dodat.");
            console.log("Dodat je novi kurs");
            location.reload(true);
        } else {
            console.log("Novi kurs nije dodat. " + res);
        }
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error("Desila se greska -> " + errorThrown);
    });

});

// obrada brisanja postojeceg kursa

$(".obrisi-kurs-button").click(function (e) {
    e.preventDefault();

    let id = $(this).data('id');

    let td = $("#" + id).closest('tr');

    request = $.ajax({
        url: 'controller/izbrisi.php',
        type: 'post',
        data: {
            id: id
        }
    });

    request.done(function (res, textStatus, jqXHR) {
        if (res === 'Success') {
            td.remove();
            alert("Kurs je obrisan.");
            //console.log("Obrisan.");
            //console.log(res, textStatus);
            location.reload(true);
        } else {
            //console.log("Kurs nije obrisan. ");
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

    request.done(function (response, textStatus, jqXHR) {
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