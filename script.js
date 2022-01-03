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

$("#obrisi-kurs").click(function (e) {
    e.preventDefault();
    console.log("Zapocetno brisanje");

    const oznaceno = $("input[name=btnRadio]:checked");

    let td = oznaceno.closest('tr');

    request = $.ajax({
        url: 'controller/izbrisi.php',
        type: 'post',
        data: {
            'id': oznaceno.val()
        }
    });

    request.done(function (res, textStatus, jqXHR) {
        if (res === 'Success') {
            td.remove();
            alert("Kurs je obrisan.");
            console.log("Obrisan.");
            console.log(res, textStatus);
            location.reload(true);
        } else {
            console.log("Kurs nije obrisan. ");
        }
    });
});

// prikazivanje forme za izmenu kursa

$("#izmeni-kurs").click(function () {
    $(".izmeni-kurs").toggleClass("hidden-kurs");

    const oznaceno = $("input[name=btnRadio]:checked");

    request = $.ajax({
        url: 'controller/get.php',
        type: 'post',
        data: {
            'id': oznaceno.val()
        },
        dataType: 'json'
    });

    request.done(function (res, textStatus, jqXHR) {
        $("#naziv-input").val(res[0]['naziv'].trim());
        $("#opis-input").val(res[0]['opis'].trim());
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.log("Doslo je do greske." + textStatus + errorThrown);
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