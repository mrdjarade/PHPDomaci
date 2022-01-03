<?php

require "../broker.php";
require "../model/Kurs.php";

if(isset($_POST["naziv"]) && isset($_POST["opis"]) && isset($_POST["id"])) {
    $novi = new Kurs(null, $_POST["naziv"], $_POST["opis"], null);
    $status = $novi->update($_POST["id"], $conn);
    if($status) {
        echo 'Success';
    } else {
        echo 'Failed';
    }
}

?>