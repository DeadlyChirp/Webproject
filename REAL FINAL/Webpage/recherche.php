<?php 
    // include_once 'header.php';
    include_once '../INCLUDES-files/connect-db-restau.inc.php';
?>

<h2>page de recherche</h2>
<br><br>
<div class="containerRestau">
    <?php
    if(isset($_POST['submit-recherche'])){

        $search = $_POST['search'];        
        
        $sql = "SELECT * FROM restaurants WHERE name LIKE '%$search%' OR adresse LIKE '%$search%' 
        OR categories LIKE '%$search%' OR ville LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)){
                $IDrestau = $row['restaurantsId'];
                echo "<a href=restau-individuel.php?ID=$IDrestau><div>
                    <h3 class='name'>".$row['name']."</h3></a>
                    <p class='adresse'> ville :".$row['ville']."</p>
                    <br>
                    <p class='adresse'> adresse :".$row['adresse']."</p>
                    <br>
                    <p class='categories'>catégories :".$row['categories']."</p>
                    <br>
                    <p class='note'>note :";
                    for($i=0;$i<$row['note'];$i++){
                        echo "★";
                    }
                    echo "</p>
                    <br>
                    <p class='prix'> prix :";
                    for($i=0;$i<$row['prix'];$i++){
                        echo "$";
                    }
                    echo "</p>
                    <br><hr>
                </div>";
            }
        } else {
            echo "pas de résultat :(";
        }
    }
    ?>
</div>

<?php
    // include_once 'footer.php';
?>