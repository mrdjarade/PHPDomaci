<?php

class Kurs {
    public $id;
    public $naziv;
    public $opis;

    public function __construct($id=null,$naziv=null,$opis=null) {
        $this->id=$id;
        $this->naziv=$naziv;
        $this->opis=$opis;
    }

    public static function prikaziSve($conn) {
        $sql = "SELECT * FROM kurs";
        return $conn->query($sql);
    }

}

?>