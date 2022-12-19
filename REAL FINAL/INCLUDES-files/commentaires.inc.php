<?php 
    include_once 'connect-db-restau.inc.php';
    // include_once '../Webpage/restau-individuel.php';

    //ici toutes les informations sont récupérées par la méthode post
    //condition = si submit a été enclenché 
    if( isset($_POST['submit'])){
        //deuxième condition qui vérifie si tous les champs ont été remplis (pour être exacct, si ils ont des valeurs différentes des valeurs de bases pré re)
        if($_POST['note'] == 0 || $_POST['titre'] == 'indiquez le titre de votre commentaire' || $_POST['description'] == 'mettre un commentaire'){    
            //renvoie sur la page précédente avec en plus error dans l'url
            $IDretour = $_POST['ID'];
            header("Location: ../Webpage/restau-individuel.php?ID=$IDretour&error");
        } else if( isset($_POST['submit'])){
            //ajoute les données remplies dans la DB 
            $restauID = $_POST['ID'];
            $usersId = $_POST['usersId'];
            $note = $_POST['note'];
            $titre = $_POST['titre'];
            $description = $_POST['description'];

            //requête
            $sql3 = "INSERT INTO commentaires(restaurantsId,usersId,note,titre,description) VALUES ($restauID,$usersId,$note,'$titre','$description');";
            mysqli_query($conn,$sql3);

            //renvoie sur la page précédente sans 'error'
            $IDretour = $_POST['ID'];
            header("Location: ../Webpage/restau-individuel.php?ID=$IDretour");
            exit();
        }
    }
?>