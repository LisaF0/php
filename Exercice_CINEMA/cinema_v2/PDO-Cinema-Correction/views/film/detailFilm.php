<?php 
    ob_start(); 
    $detailFilm = $film->fetch();
?>

<h2><?= $detailFilm["titre"]." ".$detailFilm["dureeHM"] ?></h2>
<p>
    <?= $detailFilm["synopsis"] ?>
</p>

<?php

$titre = "Détail d'un film";
$contenu = ob_get_clean();
require "views/template.php";