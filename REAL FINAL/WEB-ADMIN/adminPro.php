<?php
session_start();
require_once '../INCLUDES-files/connect-db-restau.php';
if (!$_SESSION['pwd']){ //si la session pwd n'est pas déclarée, alors on dirige l'utilisateur vers la page connexion
    header('location: ../Webpage/login.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!--AFFICHER LES MEMBRES-->
<?php //on va faire une boucle qui va nous permet de recuperer tous les membres de notre dbase
$sql = "SELECT * FROM restaurants;";
$result = mysqli_query($conn,$sql);
$resultChecked = mysqli_num_rows($result);

if ($resultChecked > 0){
    while ($row = mysqli_fetch_assoc($result)){
        ?>
        <p><?= $row['name'];?> <a href="deletePro.php?restaurantsId=<?= $row['restaurantsId'];?>" style="color: red; text-decoration: none;" >Delete this tarnished</a></p>
        <?php
    }
}
?>

</body>
</html>
