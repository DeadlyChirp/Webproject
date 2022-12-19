<?php
    session_start();

if(isset($_POST['submit'])) {
    //récupère un élement de type 'file' ayant pour nom 'file'
    $file = $_FILES['file'];
    // print_r($file);
    echo "<br>";
    //récupère les différentes partie du tableau en fonction des key et les stocks dans des variables
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    //sépare l'extension du nom du fichier 
    $fileExt = explode('.', $fileName);
    //récupère la dernière partie du tableau cad l'extension
    $fileActualExt = strtolower(end($fileExt));
    //extension autoriser à upload
    $allowed = array('jpg', 'jpeg', 'png' );
    //défini le dossier dans le quel la photo va être upload grâce à la session connectée
    $dossier = $_SESSION['ID'];
    //permet de créer le dossier de stockage si il n'est pas déjà créer
    if(!file_exists("../uploads/$dossier")){
        mkdir("../uploads/$dossier");
    }

    //si il y a déjà une photo va la supprimer
    if(file_exists("../uploads/$dossier/*")){
        unlink("../uploads/$dossier/*");
    }

    //test si le fichier a une xtension aproprié 
    if(in_array($fileActualExt, $allowed)) {
        //si il n'y a pas d'erreur
        if($fileError === 0){
            //limite la taille du fichier
            if($fileSize<100000000){
                //remplace le nom du fichier par photo.ext pour des problèmes de lisibilités
                $fileNameNew = "photo.".$fileActualExt;
                $fileDestination = '../uploads/'.$_SESSION['ID'].'/'.$fileNameNew;
                //déplace le fichier
                move_uploaded_file($fileTmpName,$fileDestination);
                echo "<br>";
                //renvoie à la page d'accueil
                echo "<a href='../Webpage/index.php'>revenir à l'accueil'</a>";
            } else {
                echo "your file is too big!";
            }
        } else {
            echo "erreurs";
        }
    } else {
        echo "you cannot upload files of this type!(allowed: jpg, jpeg, png)";
    }
}

?>