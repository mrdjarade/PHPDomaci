<?php

require_once "../broker.php";
require_once "../model/Kurs.php";

if(isset($_POST["id"])) {
    $kurs = new Kurs($_POST["id"]);
    $status = $kurs->izbrisiID($conn);
    if ($status){
        echo "Success";
    } else{
        echo "Failed";
    }
}

?>