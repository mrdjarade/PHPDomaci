<?php

require "../broker.php";
require "../model/Kurs.php";

session_start();
if(isset($_POST["naziv"]) && isset($_POST["opis"])) {
    $novi = new Kurs(null, $_POST["naziv"], $_POST["opis"], $_SESSION['adminID']);
    $status = Kurs::dodaj($novi,$conn);
    if($status) {
        echo 'Success';
    } else {
        echo $status."Neuspesno";
    }
} 

?>