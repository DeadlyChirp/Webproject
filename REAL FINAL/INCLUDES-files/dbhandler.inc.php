<!--DATE BASE HANDLER-->
<!--C'est un fichier qui va gerer et connecter à la database-->
<!--Donc apres quand on a besoin de connecter/consulter aux datas dans la database
ou mettre, inserer, sortir -->
<!--Puis on se réfère à une variable dans ce fichier pour pouvoir connecter à la
 database-->
<!--UN FICHIER TRES IMPORTANT POUR POUVOIR CONNECTER À NOTRE DATABASE-->


<!--CREATION D'UNE CONNECTION À LA DATABASE-->

<?php


$servername ="localhost";
//localhost car on utilise xampp
$dBUsername ="root";
$dBPassword ="";
//mdp par default car dans xampp mdp est empty
$dBName ="loginsignup";
//nom de la database

$connection = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName,3306);
//variable connection qui va ouvrir une connexion à notre database

if (!$connection){

    die("Connection failed: " .mysqli_connect_error());

}
//    si la connection retourn false, donc on va vouloir ecrire des messages ou qqc
//        en utilisant die(), cela va tuer ce qu'on est en train de faire equivalent a exit()
// mysqli_connect_error va nous renvoyer l'erreur qu'on a eu