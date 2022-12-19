<!-- pour les commentaires se référer à majAdresse.php -->
<?php
include_once '../Webpage/profile-restau.php';
include_once 'connect-db-restau.inc.php';


$v = $_POST['prix']; 
$ID = $_SESSION['ID'];

if (mysqli_connect_errno()) {
  echo "Impossible de se connecter à MySQL: " . mysqli_connect_error();
  exit();
}

$sql = "UPDATE restaurants set prix='$v' where restaurantsId=$ID;";
  
  if (mysqli_query($conn, $sql)) {
    echo "vos informations ont été mis à jour !";
  } else {
    echo "Une erreur est survenue: " . mysqli_error($conn);
  }

  mysqli_close($conn);
// mysqli_query($conn, $sql)
?>