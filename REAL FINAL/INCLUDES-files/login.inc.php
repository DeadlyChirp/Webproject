<?php
if (isset($_POST["submit"])){

    //get the form data from the URL
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbhandler.inc.php';
    require_once 'function.inc.php';

    if (emptyInputLogin($username, $pwd) === true) {
        header("location: ../Webpage/login.php?error=emptyinput");
        exit();
    }

    loginUser($connection, $username, $pwd);
}
//on veut assurer aussi que si l'utilisateur accede a cette page pas avec une bonne manniere
//on va le renoyer a login
else {
    header("location: ../Webpage/login.php");
    exit();
}
