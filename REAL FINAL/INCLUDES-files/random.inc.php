<!-- ancien système -->
<!-- avec ce système de fonctionnement je parie sur la quantité de resaurant inscrit ayant posté une photo -->
<?php
//glob parcours tous les fichiers présent dans le dossier upload
//et va les stockés dans $dossierPresent
$dossierPresent = glob('../uploads/*');
//$dossier present = un tableau
//stock le nombre de dossier répertorié dans $max 
$max = count($dossierPresent);
//j'enlève -1 à max dans le but d'avoir la valeure maximale du tableau car on commence à compter à partir de 0 et non pas 1
$max--;

//je définie la variable $tabPath en tant que tableau
$tabPath = array();

//comme sur l'écran d'accueil je n'affiche que six éléments 'restaurant' en dessous du carousel 
//j'utilise une boucle for qui aura comme résultat de stocker six valeurs d'ID différents
//valeurs d'ID qui elles je le rappelle sont récupérées dans uploads
for($i=0;$i<6;$i++){
    $tabPath[$i] = $dossierPresent[rand(0,$max)];
}


$tabID = array();

//je finis de définir le chemin en incluant le lien vers la photo
for($y=0;$y<6;$y++){
    $tabPath[$y] = glob($tabPath[$y]."/*")[0];
    $tabID[$y] = explode('/',$tabPath[$y])[2];
}
?>