<?php
include_once '../Webpage/profile-restau.php';
include_once 'connect-db-restau.inc.php';


$v = $_POST['adresse']; 
//session ID = ID de l'utilisateur connecté 
$ID = $_SESSION['ID'];

//test la coonexion à la DB
if (mysqli_connect_errno()) {
  echo "Impossible de se connecter à la Data Base: " . mysqli_connect_error();
  exit();
}

$sql = "UPDATE restaurants set adresse='$v' where restaurantsId=$ID;";
    //effectue une requête sql
    //la fonction mysqli_query renvoie un bool il est donc possible de l'utiliser en tant que condition
    if (mysqli_query($conn, $sql)) {
      echo "informations correctement mis à jour";
    } else {
      echo "Une erreur s'est produite: " . mysqli_error($conn);
    }
  //ferme une connexion de base de données
  mysqli_close($conn);
?>