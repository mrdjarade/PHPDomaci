<?php

class Korisnik {
    public $id;
    public $username;
    public $password;

    public function __construct($id=null,$username=null,$password=null) {
        $this->id=$id;
        $this->username=$username;
        $this->password=$password;
    }

    public static function loginUser($kor,$conn) {
        $sql = "SELECT * FROM admin WHERE username='$kor->username' and password='$kor->password'";
        return $conn->query($sql);
    }

}

?>