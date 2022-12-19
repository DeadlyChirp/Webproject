<!--CE FICHIER SERT À FAIRE DES CHOSES DANS NOTRE SITE-->
<!--POUR POUVOIR FAIRE FONCTIONNER CE SYSTEME D'INSCRIPTION-->
<!--Cela consiste à creer les auxquelles nous venos de faire reference dans le ficher
signup.inc.php-->
<?php

//fonction qui verifie si il y a une formulaire qui est vide
// Check for empty input signup
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
    $result = null; //une variable qui va renvoyer true ou false
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        //si il y a de cases qui sont vides, le prog va s'executer
        //faut que les cases soient remplies -> dans ce cas le prog va renvoyer false
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

//    Ici si l'utilisateur utilise un username non-approprié, on va renvoyer un message d'erreur
// EN DEFINISSANT LE RESULTQT EGAL A TRUE
// Check invalid username
function invalidUid($username) {
    $result = null;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true; //donc il y a une erreur -> on va renvoyer l'utilisateur à la page d'inscription
    }
    else {
        $result = false; //0 erreur, il continue
    }
    return $result;
}

// Check invalid email
function invalidEmail($email) {
    $result = null;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //filter qui va prendre une variable et dire si le premier paremetre ici est
        //un email approprié, alors on renvoie true
        //ici vu qu'on verifie d'abord les erreurs, on veut voir que si cela nous renvoie pas
        // true alors result = true
        $result = true; //donc il y a une erreur -> on va renvoyer l'utilisateur à la page d'inscription
    }
    else {
        $result = false;  //0 erreur, il continue
    }
    return $result;
}
//Les 2 mdp correspondent les un aux autres
// Check if passwords matches
function pwdMatch($pwd, $pwdrepeat) {
    $result = null;
    if ($pwd !== $pwdrepeat) {
        //pwd n'est pas egal au pwdrepeat
        //Si pwd n'est pas egal à pwdrepeat, une erreur se produit,
        // nous voulons nous assurer que ces deux sont la même chose
        $result = true; //donc il y a une erreur -> on va renvoyer l'utilisateur à la page d'inscription
    }
    else {
        $result = false; //0 erreur, il continue
    }
    return $result;
}
//PLUS DURE
//On va verifier si le nom d'utilisateur existe deja dans la base de donnée
// Check if username is in database, if so then return data
function uidExists($connection, $username, $email) {
    //la 1ere chose qu'on a besoin de faire pour tester est :
    // On doit se connecter à la base de données et voir si le username qui
    //a été soumis est deja dans le tableau de la base de données

//Ce qu'il faut faire: CREER une instruction sql argument
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    //userUid est la variable qu'on a crée sur phpMyAdmin

    //premier ; sert à ferrmer sql, 2eme sert à php

    // ? est un placeholder où on va utiliser des instructions/fonctions dj préparées pour nous connecter à la database
    // Ce qui signifie que on ne prend pas seulement les données des utilisateurs qui nous les ont donné
    // et on l'envoie toute de suite à la base de données

    //Ce qu'on a besoin de faire ici est qu'on envoie notre arguments sql à la base de données,
    //puis on va remplir les placeholders apres en fournissasnt les données qui sont ici le nom d'utilisateur variable

    //petit bonus, on peut verifer si l'email a deja ete pris aussi

    $stmt = mysqli_stmt_init($connection);
    //pour empecher les utilisateurs mettent les codes dans les input et detruisent notre site
    //on veut qu'on utilise des instructions préparées pour rendre notre système plus securisé

    //on va verifier si cette instruction échouera ou s'excutera lorsqu'on essaie d'executer cette instruction sql
    // si il y a une erreur, par exemple on ecrit users avec 2 s, cela va nous renvoyer false
    //on va verifier si il y a des erreurs
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //on veut voir si cela echouera ou non
        //s'il y a des erreurs, cela va renvoyer l'utilisateur a la page d'inscription
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    //on va transmettre les donnees des utilisateurs
    //on met des strings car on a seulement 2 string ici, username et email donc 2 "s"
    mysqli_stmt_execute($stmt);


    //donc ici ce qu'on est en train de faire est de saisir des donnees, si on prenait d'un utilisateur dans la base de donnees
    // en referent a username et son email, cela signifie que l'utilisateur existe deja dans la dbase

    //on va pas vouloir s'inscrire cet user si son username ou email existe deja dans la dbase
    // "Get result" returns the results from a prepared statement
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        //cela veut dire qu'on recupere les donnees en associant au tableau ( phpmyadmin)
//On peut utiliser $colonne pour a la fois signup et aussi login
        // s'il y a dj les donnees dans la dbase avec cet username,
        //alors on va recuperer les donnes son username
        return $row; //on retourne des donnees de la dbase pour voir si cet utilisateur existe dans la dbase ou non

        //FONCTIONNEMENT
        // ici si il y a des donnees dans la dbase avec cet username alors on va
        //recuperer les donnees cet username
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

//Ici au lieu de verifier username, on va plutot s'inscrire la personne sur le site
// Insert new user into database
function createUser($connection, $name, $email, $username, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        //on veut voir si cela echouera ou non
        //s'il y a des erreurs, cela va renvoyer l'utilisateur a la pga ed'inscription
        header("location: ../Webpage/signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    //On va avoir besoin de hasing les mdp, donc cacher les mdp hachage des mdp
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
    header("location: ../Webpage/login.php"); //0 erreur
    exit();
}
// Log user into website
// Check for empty input login
function emptyInputLogin($username, $pwd) {
    $result = null;
    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}



function loginUser($connection, $username, $pwd){
    $uidExiste = uidExists($connection, $username, $username);

    if ($uidExiste === false){
        header("location: ../Webpage/login.php?error=wrongloginbro");
        exit();
    } //recap : on recupere les donnees de la database avec le username ou email que l'utilisateur
    //avec ces data, la premiere chose qu'on doit faire est de verifier le mdp car on l'a hashed
    $pwdhashed = $uidExiste["usersPwd"];
    // egal aux donnees dans la database
    //vu que c'est un tableau associatif, (fetch_assoc), on se refere au nom de la colonne dans la db
    //car un tableau associatif dans php est un tableau ou il uitlise pas les numeros d'index
    //mais il utilise des noms pour chaque index (nom des colonnes dans la dbase)

    $verifPwd = password_verify($pwd, $pwdhashed);
    //si les 2 pwd etaient les meme, ca renvoie true, sinon false\

    if ($verifPwd === false){ //si verif renvoie false, cela veut dire que le mdp et le mdp dans
        //la dbase sont pas la mm chose
        header("location: ../Webpage/login.php?error=wrongloginbro");
        exit();
    }
    else if ($verifPwd === true){
        //login utilisateur dans le site
        //afin de stocker des donnes dans une session, on doit demarrer une session
        session_start();
        $_SESSION["userid"] = $uidExiste["usersId"];
        $_SESSION["useruid"] = $uidExiste["usersUid"];
        header("location: ../Webpage/index.php");
        exit();
    }
}