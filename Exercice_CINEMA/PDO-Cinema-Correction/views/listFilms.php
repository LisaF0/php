<?php ob_start(); ?>

<h2>Liste des films</h2>

<?php

while($film = $films->fetch()) { ?>
     <a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>">
        <?= $film["titre_film"] ?>
    </a><?= "(".$film["annee_film"].")" ?><br/>

<?php }

$films->closeCursor();

$titre = "Liste des films";
$contenu = ob_get_clean();
require "template.php";