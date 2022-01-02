<?php

class Kurs {
    public $id;
    public $naziv;
    public $opis;
    public $autor;

    public function __construct($id=null,$naziv=null,$opis=null,$autor=null) {
        $this->id=$id;
        $this->naziv=$naziv;
        $this->opis=$opis;
        $this->autor=$autor;
    }

    public static function prikaziSve($conn) {
        $sql = "SELECT * FROM kurs";
        return $conn->query($sql);
    }

    public static function pronadjiID($id,$conn) {
        $sql = "SELECT * FROM kurs WHERE kursID=$id";
        $myObj = array();
        if($msqlObj = $conn->query($sql)) {
            while($row = $msqlObj->fetch_array(1)){
                $myObj[]= $row;
            }
        }
        return $myObj;
    }

    public function izbrisiID($conn) {
        $sql = "DELETE FROM kurs WHERE kursID=$this->id";
        return $conn->query($sql);
    }

    public static function dodaj($novi,$conn) {
        $sql = "INSERT INTO kurs (naziv,opis,autor) VALUES ('$novi->naziv','$novi->opis', '$novi->autor')";
        return $conn->query($sql);
    }

    public function update($conn) {
        $sql =  "UPDATE kurs SET naziv='$this->naziv', opis='$this->opis', autor = '$this->autor'";
        return $conn->query($sql);
    }

}

?>