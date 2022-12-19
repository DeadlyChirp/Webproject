<?php
    include_once '../INCLUDES-files/random(1).inc.php';
    include_once '../INCLUDES-files/connect-db-restau.inc.php';
?>

<body>

<form action="../INCLUDES-files/random.inc.php">
    <section class="restaurants">
        <div class="container-restaurant">
            <div class="restaurants-heading">
                Restaurants
            </div>
                <div class="restaurants-grid">
                <!-- restau 0 -->
                <?php
                for($z=0;$z<6;$z++){
                    echo "<div class='restaurant-container'>";
                        echo '<div class="restaurants-img">';
                            //fait une requête SQL en fonction d'une variable définie dans random.inc.php qui correspond à un ID de restaurant
                                echo "<a href='restau-individuel.php?ID=$tabID[$z]'>";
                                $sql = "SELECT categories ,description ,name ,ville ,prix,note  FROM restaurants WHERE restaurantsId=$tabID[$z]";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                            //<!-- affiche l'image associé à l'ID, qui éxistera car les images sont récupérées par l'éxistence de fichier et non l'éxistence d'un ID  -->
                            echo "<img class='slide-img'  src='$tabPath[$z]'  alt='$z' >";
                            echo '</a>';
                        echo "</div>";
                        echo '<h3 class="nom-restaurant">';
                                echo $row['name'];
                                echo "</h3>";
                                echo "<br>";
                                echo "ville : ".$row['ville'];
                        echo '<p class="restaurant-p">';
                
                                echo "categories : ".$row['categories'];
                            
                        echo '</p>';
                        echo '<h3 id="note">';
                            
                            for($i1 = 0; $i1 < $row['note']; $i1++){
                                echo"★";
                            }
                            
                        echo '</h3>';
                        echo '<h3 class="price">';
                                    for($i1 = 0; $i1 < $row['prix']; $i1++){
                                        echo"$";
                                    }
                        echo '</h3>';
                 echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>
</form>

</body>
</html>