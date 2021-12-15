<?php

require "broker.php";
require "model/Korisnik.php";

session_start();
if(isset($_POST["username"]) && isset($_POST["password"])) {
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $user = new korisnik(null,$user,$pass);
    $odg = Korisnik::loginUser($user,$conn);

    if($odg->num_rows == 1) {
        //echo "Postoji korisnik";
        $_SESSION["user_id"] = $user->id;
        header('Location: index.php');
        exit();
    } else {
        //echo "Ne postoji korisnik";
        echo  "<script> alert('Pogresno korisničko ime ili lozinka') </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login-style.css">
    <title>Login</title>
</head>
<body>

    <div>
        <h1>Pozdrav</h1>
        <p>Unesite korisničko ime i lozinku za logovanje.</p>
    </div>

    <form method="POST" action="#">
        <div class="form-group">
            <label>Korisničko ime</label>
            <input type="text" name="username" class="form-control" placeholder="Korisničko ime..." required>
        </div>
        <div class="form-group">
            <label>Lozinka</label>
            <input type="password" name="password" class="form-control" placeholder="Lozina..." required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    
</body>
</html>