<?php

require "../broker.php";
require "../model/Kurs.php";

if(isset($_POST["autor"])) {
    $naziv = $_POST['naziv'];
    $opis = $_POST['opis'];
    $id = $_POST['id'];
    
    $result = mysqli_query($conn, "UPDATE kurs SET naziv='$naziv', opis='$opis' WHERE kursID='$id'");
    if($result) {
        echo 'Success';
    } else {
        echo 'Failed';
    }
}

?>