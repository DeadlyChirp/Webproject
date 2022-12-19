<?php

session_start();
require_once '../INCLUDES-files/connect-db-restau.php';
if (!$_SESSION['pwd']) { //si la session pwd n'est pas déclarée, alors on dirige l'utilisateur vers la page connexion
    header('location: ../Webpage/login.php');
}
if (isset($_GET['restaurantsId']) and !empty($_GET['restaurantsId'])) {
    $getId = $_GET['restaurantsId'];
    $recupUser = $conn->prepare('DELETE FROM restaurants WHERE restaurantsId = ? ');
    $recupUser->execute(array($getId));
    header('location: adminPro.php');
} else {
    echo "Id not found yet";
}
?>