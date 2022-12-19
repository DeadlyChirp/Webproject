<?php
    include_once 'header.php';
    include_once '../INCLUDES-files/connect-db-restau.inc.php';
    // session_start();
    //pas besoin de session start car déjà contenue dans header.php

    $x = $_SESSION["name"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- introduction/msg d'accueil -->
    <?php
    //affiche le nom du restaurant grâce à la variable $x qui a été définie au début du code
    echo "<h3>bienvenue patron de ".$x." </h3>";
    echo "aller vers votre page de restaurant:";
    //permet de visiter la page du restaurant, car fonctionne avec des GET 
    echo "<a href='../Webpage/restau-individuel.php?ID=$_SESSION[ID]'> vers votre page</a>";
    ?>
    <br>
    <br>

<!-- upload photo -->
    upload une photo pour le restaurant
    <form action="../INCLUDES-files/upload.inc.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="submit">upload</button>
    </form>
    <br>
    <br>

<!-- selection de categorie pour le restaurant  -->
    type de réstaurant
    <form action="../INCLUDES-files/majCategories.inc.php" method="get">
        <select name="categories" id="categories">
        <option value="">Veuillez choisir une option</option>
            <option value="français">Français</option>
            <option value="vietnamien">vietnamien</option>
            <option value="pizza">pizza</option>
            <option value="Sushi">Sushi</option>
        </select>
        <input type="submit" value="submit">
    </form>
    <br>
    <br>
    <br>

    <!-- mettre à jour la description du restaurant -->
    
        <form action="../INCLUDES-files/majDescription.inc.php" method="POST" enctype="multipart/form-data">    
            <TEXTAREA Name="description" ROWS="6" COLS="150">écrire/mettre à jour la description du restaurant ici</TEXTAREA>
        <button type="submit" name="submit">upload</button>
        </form>
    <br>
    <br>

    <!-- mettre à jour le nom du restau -->
    mettre à jour le nom du restaurant
    <form action="../INCLUDES-files/majNom.inc.php" method="POST" enctype="multipart/form-data">    
        <input type="text" name="nomRestaurant">
        <button type="submit" name="submit">upload</button>
    </form>
    <br>
    <br>
        
    <!-- mettre à jour l'adresse du restau -->
    mettre à jour l'adresse du restaurant
    <form action="../INCLUDES-files/majAdresse.inc.php" method="POST" enctype="multipart/form-data">    
        <input type="text" name="adresse">
        <button type="submit" name="submit">upload</button>
    </form>
    <br>
    <br>

    <!-- mettre à jour le prix du restau -->
    mettre à jour le prix moyen du restaurant
    <form action="../INCLUDES-files/majPrix.inc.php" method="post">
        <select name="prix" >
        <option value="">Veuillez choisir une option</option>
            <option value="1">1/5</option>
            <option value="2">2/5</option>
            <option value="3">3/5</option>
            <option value="4">4/5</option>
            <option value="5">5/5</option>
        </select>
        <input type="submit" value="submit">
    </form>
    <br>
    <br>

<!-- revenir en arrière -->
    <a href="../Webpage/index.php">revenir à l'acueil</a>
</body>
</html>