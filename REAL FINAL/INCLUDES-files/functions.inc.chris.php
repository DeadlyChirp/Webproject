<!-- pour les commentaires se référer à functions.inc.php -->
<?php
include_once 'connect-db-restau.inc.php';

function emptyInputSignup($name,$email,$adresse, $ville, $pwd, $pwdrepeat){
    $result = null;
    if(empty($name) ||empty($email) ||empty($adresse) ||empty($ville) ||empty($pwd) ||empty($pwdrepeat) ){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result = null;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdrepeat){
    $result = null;
    if($pwd !== $pwdrepeat){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function emailExists($conn, $email) {

    $sql = "SELECT * FROM restaurants WHERE email = ?;";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Webpage/signup-restaurant.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row; 
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}



function createUser($conn, $name, $email, $adresse, $ville, $pwd) {
    $sql = "INSERT INTO restaurants (name, email, adresse, ville, Pwd) VALUES (?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../Webpage/signup-restaurant.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $adresse, $ville, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("location: ../Webpage/login-restaurant.php"); 
    exit();
}

function emptyInputLogin($email, $pwd) {
    $result = null;
    if (empty($email) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $email, $pwd){
    $emailExists = emailExists($conn, $email);

    if ($emailExists === false){
        header("location: ../Webpage/login-restaurant.php?error=wrongloginbro");
        exit();
    } 
    $pwdhashed = $emailExists["pwd"];

    $verifPwd = password_verify($pwd, $pwdhashed);

    if ($verifPwd === false){ 
        header("location: ../Webpage/login-restaurant.php?error=wrongloginbro");
        exit();
    }
    else if ($verifPwd === true){
        session_start();
        $_SESSION["email"] = $emailExists["email"];
        $_SESSION["ID"] = $emailExists["restaurantsId"];
        $_SESSION["name"] = $emailExists["name"];
        header("location: ../Webpage/index.php");
        exit();
    }
}

?>