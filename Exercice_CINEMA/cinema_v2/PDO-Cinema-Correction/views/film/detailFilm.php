<?php 
    ob_start(); 
    $detailFilm = $film->fetch();
?>
<img src="img/<?= $detailFilm["affiche"]?>" style="width:30vw; float:left">
<h2><?= $detailFilm["titre"]." ".$detailFilm["dureeHM"] ?></h2>
<?php $etoile = "<i class='fas fa-star'></i>";
$etoileVide = "<i class='far fa-star'></i>";
$noteInverse = 5-$detailFilm['note']; ?>

<?= str_repeat($etoile, $detailFilm['note']).str_repeat($etoileVide, $noteInverse) ?><br><br>
<p>
    <?= $detailFilm["synopsis"] ?>
</p>

<p>Casting</p>

<ul>
    <?php while ($detailCasting = $casting->fetch(PDO::FETCH_ASSOC)){
        ?>
    <li><?=$detailCasting["nom_role"]." ("?>
    <a href='index.php?action=detailActeur&id=<?= $detailCasting["id_a"] ?>'>
    <?= $detailCasting ["nom_acteur"]." ".$detailCasting ["prenom_acteur"]?></a>)</li>
    <?php } ?>
</ul>

<?php

$titre = "Détail d'un film";
$contenu = ob_get_clean();
require "views/template.php";