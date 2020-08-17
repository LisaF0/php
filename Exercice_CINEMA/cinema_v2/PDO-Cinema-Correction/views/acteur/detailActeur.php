<?php
    ob_start();
    $detailActeur = $acteur->fetch();
?>

<h2><?= $detailActeur["nom_acteur"]." ".$detailActeur["prenom_acteur"]." (".$detailActeur["age"] ?> ans)</h2>

<p>Filmographie: </p>
<ul>
    <?php while ($detailFilms = $films->fetch(PDO::FETCH_ASSOC)){
        ?>
    <li><?=$detailFilms["nom_role"]." ("?>
    <a href='index.php?action=detailFilm&id=<?= $detailFilms["id_f"] ?>'>
    <?= $detailFilms ["titre"]." ".$detailFilms ["annee_sortie"].")"?></a></li>
    <?php } ?>
</ul>


<?php

$titre = "Détail d'un acteur";
$contenu = ob_get_clean();
require "views/template.php";