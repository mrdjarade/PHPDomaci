<?php

require "broker.php";
require "model/Kurs.php";

session_start();
if(!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Početna strana</title>
</head>
<body>
    <div class="padding-container">
        <h1>Dobrodošli</h1>
        <p>Ovo je aplikacija o kursevima, koje različiti administratori mogu da kreiraju, menjaju, brišu i pretražuju.</p>
        <button style="margin-bottom:30px;" type="button" id="novi-kurs" class="btn btn-success">Novi kurs</button>

        <div class="prozor-kurs">
            <form>
                <div class="form-group">
                    <label>Naziv kursa</label>
                    <input type="text" class="form-control" placeholder="Unesite naziv kursa...">
                </div>
                <div class="form-group">
                    <label>Kratak opis kursa</label>
                    <textarea type="text" class="form-control" placeholder="Unesite kratak opis kursa..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Dodaj</button>
            </form>
        </div>

    </div>

    <div class="padding-container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Kurs ID</th>
                    <th scope="col">Naziv kursa</th>
                    <th scope="col">Opis</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Opcije</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td scope="row">3</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>@mdo</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <script src="js/script.js"></script>

</body>
</html>