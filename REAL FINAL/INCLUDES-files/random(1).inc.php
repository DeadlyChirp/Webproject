<!-- système actuel -->
<?php
//glob parcours tous les fichiers présent dans le dossier upload
//et va les stockés dans $dossierPresent
$dossierPresent = glob('../uploads/*');
//$dossier present = un tableau
//stock le nombre de dossier répertorié dans $max
$max = count($dossierPresent);
$max--;
//dossier $dossierPresentNew est mélanger aléatoirement
$dossierPresentNew = shuffle($dossierPresent);


$tabPath = array();


$i=0;
$tabNumRand = array();

//inférieur à 9 car 9 affichage dans index-affichage-restau.php
while($i<6){
    $tabPath[$i] = $dossierPresent[$i];
    $i++;
}

$tabID = array();

for($y=0;$y<6;$y++){
    //récupère le fichier dans le dossier qui a été défini aléatoirement
    $tabPath[$y] = glob($tabPath[$y]."/*")[0];
    //récupère l'ID par la fonction explode après avoir transformé en tableau un string
    //qui permetra d'afficher les informations relatives à l'id dans index-affichage
    $tabID[$y] = explode('/',$tabPath[$y])[2];
}
?>