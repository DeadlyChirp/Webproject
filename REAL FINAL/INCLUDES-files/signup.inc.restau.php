<!-- pour les commentaires se référer à signup.inc.php -->
<?php

    if (isset($_POST["submit"])) {
        
        $name = ($_POST["name"]);
        $email = ($_POST["email"]);
        $adresse = ($_POST["adresse"]);
        $ville = ($_POST["ville"]);
        $pwd = ($_POST["pwd"]);
        $pwdrepeat = ($_POST["pwdrepeat"]);
        
        require_once 'connect-db-restau.inc.php';
        require_once 'functions.inc.chris.php';

        if(emptyInputSignup($name,$email,$adresse, $ville, $pwd, $pwdrepeat) !== false){
            header("location: ../Webpage/signup-restaurant.php?error=emptyinput");
            exit();
        }
        if(pwdMatch($pwd, $pwdrepeat) !== false){
            header("location: ../Webpage/signup-restaurant.php?error=passwordsdontmatch");
            exit();
        }
        if(invalidEmail($email) !== false){
            header("location: ../Webpage/signup-restaurant.php?error=invalidEmail");
            exit();
        }
        if(emailExists($conn, $email) !== false){
            header("location: ../Webpage/signup-restaurant.php?error=invalidEmail");
            exit();
        }

        createUser($conn, $name, $email, $adresse, $ville, $pwd);
        

    } else {
        header("location: ../Webpage/signup-restaurant.php");
        exit();
    }
?>