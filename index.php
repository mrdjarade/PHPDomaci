<?php

require "broker.php";
require "model/Kurs.php";

session_start();
if(!isset($_SESSION['adminID'])) {
    header("Location: login.php");
    exit();
}

$svi = Kurs::prikaziSve($conn);

if(!$svi) {
    echo "Došlo je do greške.";
    exit();
}

if($svi->num_rows == 0) {
    echo "Nema postojećih kurseva.";
    exit();
} else {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/style.css">
    <title>Početna strana</title>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <div class="padding-container">
        <h1>Dobrodošli</h1>
        <p>Ovo je aplikacija o kursevima, koje različiti administratori mogu da kreiraju, menjaju, brišu i pretražuju.</p>
        <button style="margin-bottom:30px;" type="button" id="novi-kurs" class="btn btn-success">Novi kurs</button>

        <div class="prozor-kurs">
            <form action="#" method="POST" id="dodajNovi">
                <div class="form-group">
                    <label>Naziv kursa</label>
                    <input name="naziv" type="text" class="form-control" placeholder="Unesite naziv kursa...">
                </div>
                <div class="form-group">
                    <label>Kratak opis kursa</label>
                    <textarea name="opis" type="text" class="form-control" placeholder="Unesite kratak opis kursa..."></textarea>
                </div>
                <button id="btnDodaj" formmethod="POST" type="submit" class="btn btn-primary">Dodaj</button>
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
                    <th scope="col">Autor ID</th>
                    <th scope="col">Opcije</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = $svi->fetch_array()):
                ?>
                <tr>
                    <td scope="row"><?php echo $row["kursID"] ?></td>
                    <td><?php echo $row["naziv"] ?></td>
                    <td><?php echo $row["opis"] ?></td>
                    <td><?php echo $row["autor"] ?></td>
                    <td>
                        <button formmethod="POST" type="button" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></button>
                        <button formmethod="POST" type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <?php
                    endwhile;
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <script src="script.js"></script>
    
</body>
</html>