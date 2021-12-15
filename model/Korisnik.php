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

    public static function loginUser($user,$conn) {
        $sql = "SELECT * FROM admin WHERE username='$user->username' and password='$user->password'";
        return $conn->query($sql);
    }

}

?>