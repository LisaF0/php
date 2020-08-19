<?php ob_start(); 
$detailRealisateur = $realisateur->fetch();
?>

<h2><?= $detailRealisateur["nom_realisateur"]." ".$detailRealisateur["prenom_realisateur"]." (".$detailRealisateur["age"] ?> ans)</h2>
<p>Filmographie: </p>
<ul>
    <?php while ($detailFilms = $casting->fetch(PDO::FETCH_ASSOC)){
        ?>
    <li><?=$detailFilms["titre"]?>
    <a href='index.php?action=detailFilm&id=<?= $detailFilms["id_f"] ?>'>
    <?= "(".$detailFilms["annee_sortie"].")"?></a></li>
    <?php } ?>
</ul>




<?php

$titre = "Détail d'un réalisateur";
$contenu = ob_get_clean();
require "views/template.php";