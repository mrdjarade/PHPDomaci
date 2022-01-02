$("#novi-kurs").click(function (e) {
    e.preventDefault();
    $(".prozor-kurs").toggleClass("hidden-kurs");
});

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