<!--Notre page d'accueil n'est pas du tout sécurisé-->
<!--Utilisateurs peuvent quand même accéder à la page admin en utilisant URL-->
<?php
//pour securiser
session_start();
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
    <title>Home</title>
</head>
<body>
<p>heheheheheh</p>
<a HREF="adminMember.php">Show all members!</a>
<a href="adminPro.php">Show all pro users</a>
</body>
</html>
