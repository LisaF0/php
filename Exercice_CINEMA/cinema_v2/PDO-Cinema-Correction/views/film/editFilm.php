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
        <option value="<?= $realisateur['id_realisateur'] ?>" <?= $realisateur["id_realisateur"] === $detailFilm['id_realisateur'] ? 'selected="selected"' : '' ?> ><?= $realisateur['nom_realisateur']." ".$realisateur['prenom_realisateur'] ?></option>
    <?php } ?>
</select>

<label for="annee_sortie">Année</label>
<input class="uk-input" type="number" name="annee_sortie" id="annee_sortie" value='<?= $detailFilm["annee_sortie"]?>' required>


<label for="duree">Durée (min)</label>
<input class="uk-input" type="int" name="duree" id="duree" value='<?= $detailFilm["duree"]?>' required>

<label for="note">Note</label>
<input class="uk-input" type="int" name="note" id="note" value='<?= $detailFilm["note"]?>' required>

<label for="id_genre">Genre</label>
    <select class="uk-select" 
            name="id_genre[]" 
            id="id_genre"
            value='<?= $detailFilm['libelle'] ?>'
            multiple><?php 
        
        
            while($genre = $genres->fetch(PDO::FETCH_ASSOC))
            {?>
                <option value="<?= $genre['id_genre'] ?>" <?= $genre["id_genre"] === $detailFilm['id_genre'] ? 'selected="selected"' : '' ?>><?= $genre['libelle'] ?></option>
            <?php } ?>
    </select>
<!-- ternaire compare 2tableaux-->
<label for="synopsis">Synopsis</label>
<textarea class="uk-input" name="synopsis"><?= $detailFilm["synopsis"]?></textarea>

<input class="uk-button uk-margin-top" type="submit" value="Modifier">
</form>


<?php

$titre = "Ajouter un film";
$contenu = ob_get_clean();
require "views/template.php";