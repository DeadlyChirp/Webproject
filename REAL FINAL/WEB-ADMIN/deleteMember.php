<?php

session_start();
require_once '../INCLUDES-files/dbhandler.inc.php';
if (!$_SESSION['pwd']) { //si la session pwd n'est pas déclarée, alors on dirige l'utilisateur vers la page connexion
    header('location: ../Webpage/login.php');
}
if (isset($_GET['usersId']) and !empty($_GET['usersId'])) {
    $getId = $_GET['usersId'];
        $recupUser = $connection->prepare('DELETE FROM users WHERE usersId = ? ');
        $recupUser->execute(array($getId));
    header('location: adminMember.php');
} else {
    echo "Id not found yet";
}
