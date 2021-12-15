<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "kursevi";

$conn = new mysqli($host,$user,$password,$db);

if ($conn->connect_errno){
    exit("Doslo je do greske prilikom uspostavljanja konekcije sa bazom");
}

?>