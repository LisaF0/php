<?php ob_start(); 
$detailRealisateur = $realisateur->fetch();
?>

<h2><?= $detailRealisateur["nom_realisateur"]." ".$detailRealisateur["prenom_realisateur"]." (".$detailRealisateur["age"] ?> ans)</h2>

<?php

$titre = "Détail d'un réalisateur";
$contenu = ob_get_clean();
require "views/template.php";