<?php

require "../broker.php";
require "../model/Kurs.php";

if(isset($_POST["id"])) {
    $niz = Kurs::pronadjiID($_POST["id"],$conn);
    echo json_encode($niz);
}

?>