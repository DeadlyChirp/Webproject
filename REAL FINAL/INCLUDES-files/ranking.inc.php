<?php 
    include_once 'connect-db-restau.inc.php';
?>
    <?php 
    //précise la connexion dans la variable "$sql, order by note = note décroissante, LIMIT 4 = les 4 premiers"
    $sql = "SELECT * FROM restaurants ORDER BY note DESC  LIMIT 4 "; 
    //envoie une requête ($conn = requete SQL de connexion , $sql = précise la DB à la quelle se connécter)
    $result = mysqli_query($conn, $sql); 
    //récupère le nombre de ligne dans la DB stockée dans $result
    $resultCheck = mysqli_num_rows($result);
    //si il ya au moins une ligne dans la db
    $y=0;
    if($resultCheck > 0){
        //condition du while = un tableau avec un cursuer qui se déplace à chaque fois et si il se déplace sur "null" renvoie faux
        // //dans notre exemple on a un tableau de 4 rows donc on aura un équivalent de while(i=0,i<4,i++)
        // // $y=1;
        $tabPath=array();
        while($row = mysqli_fetch_assoc($result)){
            
            $a = $row['restaurantsId'];
            $dir = "../uploads/$a";

            if (is_dir($dir)){
                if ($dh = opendir($dir)){
                    while (($file = readdir($dh)) !== false){
                        if($file[0] !== "."){
                            // echo "filename:" . $file . "<br>";
                            $b = $file;
                        }
                    }
                    closedir($dh);
                }
            }
            $tabID[$y] = $a;
            $tabPath[$y] = $dir."/".$b;
            $y++;
        }
    }
?>
