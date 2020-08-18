<?php 
    ob_start(); 
    $detailGenre = $genre->fetch();
    //var_dump($film);?>
<h2><?= $detailGenre["libelle"]  ?></h2>

<ul>
    <?php while ($detailFilm = $film->fetch(PDO::FETCH_ASSOC)){
        ?>
    <li><?=$detailFilm["titre"]." ("?>
    <a href='index.php?action=detailFilm&id=<?= $detailFilm["id_film"] ?>'>
    <?= $detailFilm ["titre"]?></a>)</li>
    <?php } ?>
</ul>

<?php

$titre = "Détail d'un genre";
$contenu = ob_get_clean();
require "views/template.php";