<?php
    include_once 'header.php';
    include_once '../INCLUDES-files/connect-db-restau.inc.php';
    include_once '../INCLUDES-files/commentaires.inc.php';
    include_once '../INCLUDES-files/dbhandler.inc.php';

    //je précise $ID pour éviter de réutiliser $_GET['ID] qui alourdie le code et qui est plus compliqué d'utilisation
    $ID = $_GET['ID'];
    $sql = "SELECT categories ,description ,name ,adresse, ville, prix  FROM restaurants WHERE restaurantsId=$ID";
    //requête stockée dans la variable $result
    $result = mysqli_query($conn, $sql);
    //lis la requête est déplace la 
    $row = mysqli_fetch_assoc($result);

    //plusieurs fois une connexion identique à la DB car j'utilise des fetch_assoc avec des while qui vont déplacer le curseur et c'est plus simples de juste créer plusieurs variables 

    $sql1 = "SELECT * FROM commentaires WHERE restaurantsId=$ID";
    $result1 = mysqli_query($conn, $sql1);
    $resultCheck1 = mysqli_num_rows($result1);

    $sql2 = "SELECT * FROM commentaires WHERE restaurantsId=$ID";
    $result2 = mysqli_query($conn, $sql2);
    $resultCheck2 = mysqli_num_rows($result2);
?>

<style>
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
    <title>Restau2</title>
    <link rel="stylesheet" href="../css blocks/restau.css">
</head>
<body>
<div id="scroll_to_top">
    <a href="#top"><img src="../background/fleche-vers-le-haut.webp" alt="Retourner en haut" /></a>
</div>
    <div id="header">
        <h1>
            <?php 
            //récupère la ligne contenant le 'name' du restaurant ayant l'ID dans l'url
                echo $row['name'];
                echo "</h1>";
            //récupère la ligne contenant le 'adresse' du restaurant ayant l'ID dans l'url
                echo $row['adresse']
                ."<br>".$row['ville'];
            ?>

    </div>
    
    <div class="description-restau" id="texte-presentation">
        <!-- haut de page comme une petite banderole d'introduction  -->
        <p>
            <?php 
            //récupère la ligne contenant le 'description' du restaurant ayant l'ID dans l'url
                echo $row['description'];
            ?>
        </p>
    </div>

    <!-- début de la colonne de gauche -->
    <div class="colonne-de-gauche">
        <div class="petite-photo">
            <!-- petite photo du restau surement un petit carousel -->
            <?php  
            if(file_exists('../uploads/'.$ID)){
            //affiche la photo en parcourant les fichiers grace à glob, est va jusque dans le fichier au nom de l'ID, pour former un tableau avec les informations
            //comme il n'y a qu'un seul fichier je demande la première ligne du tableau 
                echo "<img src=".glob('../uploads/'.$ID.'/*')[0]."  alt='restau numéro.$ID'>";
            }
            ?>
        </div>    

        <div class="détails">
        <?php
        echo "<h1 id='détail'>détails</h1>";
        //condition d'affichage = si une 'catégorie' a été assignée au restaurant 
        if(strlen($row['categories']) > 0){
            echo "<h2>type de cuisine :</h2> "; 
            echo $row['categories'];    
        }
        
        echo "<br><br><br><br>";
        
        //condition = si il y a un commentaire (ce qui inclu au moins une note)
        if($resultCheck2 > 0){
                echo "<h2>note du restaurant :</h2> ";  
                    
                $total = 0;
                $div = 0;
                while($row2 = mysqli_fetch_assoc($result2)){
                    $total = $total + $row2['note'];
                    $div++;
                }
                $moyenne = $total/$div;
                //number format demande la variable qui doit être un int et le chiffre après la virgule signifie le nombre de chiffre qui vont s'afficher après la virgule
                $varMoyenne = number_format($moyenne,2);
                for($i=0;$i<$varMoyenne;$i++){
                    echo "★";
                }

                $sqlN = "UPDATE restaurants set note='$varMoyenne' where restaurantsId=$ID";
                mysqli_query($conn, $sqlN);
            }
        ?> 
        </div>    
    <!-- fin de la colonne de gauche -->
    </div>

    <!-- début de la colonne de droite -->
    <div class="colonne-de-droite">
        <div class="avis-restau">
            <div class="mettreCom">  
                <?php 
                //n'affiche la zone / interface pour poster un commentaire que dans le cas où on est connécté en tant qu'utilisateur
                if (isset($_SESSION["useruid"])){
                echo "<form action = '../INCLUDES-files/commentaires.inc.php' method = 'POST'>";
                    echo "Vous souhaitez poster un commentaire?";
                    echo "<br>";
                    echo "<select name='note'>";
                    echo "<option value='0'>Veuillez choisir une note</option>";
                        echo "<option value=1>1/5</option>";
                        echo "<option value=2>2/5</option>";
                        echo "<option value=3>3/5</option>";
                        echo "<option value=4>4/5</option>";
                        echo "<option value=5>5/5</option>";
                    echo "</select>";
                    echo "<br>";
                    //textarea permet d'avoir des zones d'input plus grandes
                        echo "<TEXTAREA Name='titre' ROWS='1' COLS='75'>indiquez le titre de votre commentaire</TEXTAREA>";
                    echo "<br>";
                        echo "<TEXTAREA Name='description' ROWS='6' COLS='75'>mettre un commentaire</TEXTAREA>";
                    echo "<br>";
                    //permet de transférer l'ID sans qu'aucune action ni connaissance de cette action ne soit requise par l'utilisateur
                    echo "<input type='hidden' id='ID' name='ID' value=$ID>";
                    $usersId = $_SESSION['userid'];
                    echo "<input type='hidden' id='ID' name='usersId' value=$usersId>";
                        echo "<button type='submit' name='submit'>upload</button>";
                echo "</form>";
                    echo "<br><br>";
                }

                //si dans l'url on retrouve error rien ne se passera et se message s'affichera
                if(isset($_GET['error'])){
                    echo "veuillez remplir tous les champs";
                    echo "<br><br>";
                }
                ?>
            </div>
            <div class="avis">
            <?php
            //condition d'affichage = si il y a au moins un commentaires
            if($resultCheck1 > 0){
                echo "<h3>Avis :</h3>";
                echo "<br><br>";
                //condition du while = tant que il y a des lignes de 'tableau' 
                while($row1 = mysqli_fetch_assoc($result1)){
                    //récupère le nom dans la DB userslogin grace à l'ID stocké dans la DB de commentaires
                    $usersId = $row1['usersId'];
                    $sql4 = "SELECT usersName FROM users WHERE usersId=$usersId";
                    $result4 = mysqli_query($connection, $sql4);
                    $row4 = mysqli_fetch_assoc($result4);
                    echo "écrit par : ".$row4['usersName'];
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
            }
            ?>
            </div>
        </div>
    </div>

</body>
</html>
<?php mysqli_close($conn); ?>