<?php 
    ob_start(); 
    $detailFilm = $film->fetch();
?>

<h2>Editer un film</h2>


<form action="index.php?action=editFilmOK&id=<?= $detailFilm["id_film"] ?>" method="POST">
<label for="titre">Titre</label>
<input class="uk-input" 
        type="text" 
        name="titre" 
        id="titre" 
        value=' <?= $detailFilm["titre"] ?>'
        required>

    <label for="id_realisateur">Réalisateur</label>
    <select class="uk-input" 
            name="id_realisateur" 
            id="id_realisateur"
            value=' <?= $detailFilm['nom_realisateur']." ".$detailFilm['prenom_realisateur'] ?>'>
            <?php 
    
    
        while($realisateur = $realisateurs->fetch(PDO::FETCH_ASSOC))
        {?>
            <option value="<?= $realisateur['id_realisateur'] ?>"><?= $realisateur['nom_realisateur']." ".$realisateur['prenom_realisateur'] ?></option>
        <?php } ?>
    </select>

<label for="annee_sortie">Année</label>
<input class="uk-input" type="number" name="annee_sortie" id="annee_sortie" value='<?= $detailFilm["annee_sortie"]?>' required>


<input class="uk-button uk-margin-top" type="submit" value="Modifier">
</form>

<?php

$titre = "Ajouter un film";
$contenu = ob_get_clean();
require "views/template.php";