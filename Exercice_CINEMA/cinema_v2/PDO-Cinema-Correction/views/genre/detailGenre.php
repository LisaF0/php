<?php 
    ob_start(); 
    $detailGenre = $genre->fetch();
?>
<h2><?= $detailGenre["libelle"] ?></h2>

<ul>
    <?php while ($detailGenre = $filmsGenre->fetch(PDO::FETCH_ASSOC)){
        ?>
    <li><?=$detailGenre["titre"]." ("?>
    <a href='index.php?action=detailGenre&id=<?= $detailGenre["id_film"] ?>'>
    <?= $detailGenre ["titre"]?></a>)</li>
    <?php } ?>
</ul>

<?php

$titre = "Détail d'un genre";
$contenu = ob_get_clean();
require "views/template.php";