<?php

if (isset($_POST["submit"])) {
    //si l'utilisateur a bien soumis les cases correctement -> ce fichier php va "demarrer"
    //sinon on va le renvoyer à la page sign-up
    //isset() Détermine si une variable est définie et est différente de NULL.
//if this is set inside the code then continue what the user is doing. If not, throw the user back to the signup
//    echo "It works";

    //get the form data from the URL
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    //ce qu'on a fait ici, c'est qu'on a prendre des
// data dans URL afin que nous les ayons prêtes à être utliséé dans notre script
// [nom de chaque data on a mis]

    // Then run a bunch of error handlers to catch any user mistakes we can


    require_once "dbhandler.inc.php";
    require_once 'function.inc.php';
    //On va utiliser ce fichier Dbasehandler pour verifier si l'utilisateur a bien mis ses coordonnees
    //C'est un processus qui consiste à determiner si l'utilisateur a fait des erreus
    //Ce sont des error handling fonctions

    // Left inputs empty
    // We set the functions "!== false" since "=== true" has a risk of giving us the wrong outcome
    if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
        //function emptyInputSignup. Pourquoi !== false et non pas == true?
        //si cela renvoie autre chose à part true ou false, alors il va comprendre cela comme n'etant pas une erreur
        //techniquement c'est une erreur car on a besoin false ( 0 erreur) pour avancer

        //Vu qu'on ne peut pas sasvoir qu'est ce que l'utilisateur a mis dans le formulaire donc il va falloir verifier toutes les variables
        //si elles sont vides
        header("location: ../Webpage/signup.php?error=emptyinput");
        //On doit inclure une erreur lorqu'on renvoit l'utilisateur à la page d'inscription
        //si erreur = emptyInput alors que clairement utilisateur a oublié de taper quelque chose dans la formulaire
        exit();
    }
    // Proper username chosen
    if (invalidUid($username) !== false) {
        header("location: ../Webpage/signup.php?error=invaliduid");
        exit();
    }
    // Proper email chosen. Mettre bien un email avec @
    if (invalidEmail($email) !== false) {
        header("location: ../Webpage/signup.php?error=invalidemail");
        exit();
    }
    // Do the two passwords match?
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../Webpage/signup.php?error=passwordsdontmatch");
        exit();
    }
    // Is the username or email taken already
    if (uidExists($connection, $username,$email) !== false) {
        header("location: ../Webpage/signup.php?error=statementfailed");
        exit();
    }

    // If we get to here, it means there are no user errors

    // insert the user into the database
    //Une fois on est a cet etape ci, cela signifie que l'utilisateur n'a fait pas d'erreur
    //donc on va s'inscrire les utilisateurs dans la database, pour en utilisant
    // les variables, on va les stocker dans la database

    createUser($connection, $name, $email, $username, $pwd);

} else {
    header("location: ../Webpage/signup.php");
    exit();
}
