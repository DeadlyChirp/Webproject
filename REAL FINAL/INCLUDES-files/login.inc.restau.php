<?php
if (isset($_POST["submit"])){

    //get the form data from the URL
    $username = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once 'connect-db-restau.inc.php';
    require_once 'functions.inc.chris.php';

    if (emptyInputLogin($username, $pwd) === true) {
        header("location: ../Webpage/login-restaurant.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
    
}
//on veut assurer aussi que si l'utilisateur accede a cette page pas avec une bonne manniere
//on va le renoyer a login
else {
    header("location: ../Webpage/login-restaurant.php");
    exit();
}
?>