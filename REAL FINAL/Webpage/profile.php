<?php 
include_once 'header.php';
include_once '../INCLUDES-files/dbhandler.inc.php';
include_once '../INCLUDES-files/connect-db-restau.inc.php';

    $ID = $_SESSION["userid"];
    
    $sql = "SELECT * FROM users WHERE usersId=$ID";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);

    $sql1 = "SELECT * FROM commentaires WHERE usersId=$ID";
    $result1 = mysqli_query($conn, $sql1);
    $resultCheck1 = mysqli_num_rows($result1);
?>

<style>
    body{
        text-align: center;
    }
    hr{
        width: 60%;
        margin: auto;
    }
    #scroll_to_top {
        position: fixed;
        width: 25px;
        height: 25px;
        bottom: 50px;
        right: 30px;
    }
    #scroll_to_top img {
        width: 25px;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="scroll_to_top">
    <a href="#top"><img src="../background/fleche-vers-le-haut.webp" alt="Retourner en haut" /></a>
</div>
<!-- introduction/msg d'accueil -->
    <?php
    //affiche le nom du restaurant grâce à la variable $x qui a été définie au début du code
    echo "<h3>bienvenue ".$row['usersName']." </h3>";
    ?>
<br><br>
<!-- revenir en arrière -->
<a href="../Webpage/index.php">revenir à l'acueil</a>
<br><br><br>
<div class="commentaires">
<h3>Vos commentaires:</h3>
<!-- consulter les commentaires que l'on a posté -->
<?php
            if($resultCheck1 > 0){
                echo "<br>";
                //condition du while = tant que il y a des lignes de 'tableau' 
                while($row1 = mysqli_fetch_assoc($result1)){
                    //récupère le nom dans la DB userslogin grace à l'ID stocké dans la DB de commentaires
                    echo "<h3>";
                    echo $row1['titre'];
                    echo "<br>";
                    //récupère la note (5max) et affiche un nombre d'étoiles(*) équivalent
                    for($i=0;$i<$row1['note'];$i++){
                        echo "★";
                    }
                    echo "</h3>";
                    echo $row1['description'];
                    echo "<hr>"; 
                }   
            } else {
                echo "vous n'avez pas posté de commentaires";
            }
?>            
</div>

</body>
</html>