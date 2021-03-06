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
        <div style="display: flex; align-items:center">
            <button style="margin-right:20px; margin-bottom:30px; padding:0px; width:100px; height:40px" type="button" id="novi-kurs" class="btn btn-success">Novi kurs</button>
            <button style="margin-right:20px; margin-bottom:30px; padding:0px; width:40px; height:40px" type="button" class="btn btn-info" id="sortiraj"><i class="fas fa-sort"></i></button>
            <input style="margin-right:20px; width:200px; display:inline; margin-bottom:30px" type="text" class="form-control" id="search" placeholder="Pretražite kurseve...">
        </div>

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

        <div class="izmeni-kurs">
            <form action="#" method="POST" id="izmeniKurs">
                <div class="form-group">
                    <label>KursID</label>
                    <input name="id" id="id-input" disabled type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label>Naziv kursa</label>
                    <input name="naziv" id="naziv-input" type="text" class="form-control" placeholder="Unesite naziv kursa...">
                </div>
                <div class="form-group">
                    <label>Kratak opis kursa</label>
                    <textarea name="opis" id="opis-input" type="text" class="form-control" placeholder="Unesite kratak opis kursa..."></textarea>
                </div>
                <div class="form-group">
                    <label>Autor</label>
                    <input name="autor" id="autor-input" disabled type="text" class="form-control">
                </div>
                <button id="btnIzmeni" formmethod="POST" type="submit" class="btn btn-warning">Izmeni</button>
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
            <tbody class="telo">
                <?php
                    while($row = $svi->fetch_array()):
                ?>
                <tr id="<?php echo $row["kursID"]?>">
                    <td scope="row"><?php echo $row["kursID"] ?></td>
                    <td data-target="naziv"><?php echo $row["naziv"] ?></td>
                    <td data-target="opis"><?php echo $row["opis"] ?></td>
                    <td data-target="autor"><?php echo $row["autor"] ?></td>
                    <td>
                        <a href="#" style="margin-right:10px;" class="btn btn-warning btn-sm izmeni-kurs-button" data-id="<?php echo $row['kursID']; ?>"><i class="fas fa-pen"></i></a>
                        <a href="#" class="btn btn-danger btn-sm obrisi-kurs-button" data-id="<?php echo $row['kursID']; ?>"><i class="fas fa-trash"></i></a>
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