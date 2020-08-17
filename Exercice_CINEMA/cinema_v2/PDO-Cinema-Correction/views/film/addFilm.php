
<?php ob_start(); 

?>

<h2>Ajouter un Film</h2>

<form action="index.php?action=addFilmOK" method="POST">
    <label for="titre">Titre</label>
    <input class="uk-input" type="text" name="titre" required>

    <label for="id_realisateur">Réalisateur</label>
        <select class="uk-input" name="id_realisateur" id="id_realisateur"><?php 
        
        
            while($realisateur = $realisateurs->fetch(PDO::FETCH_ASSOC))
            {?>
                <option value="<?= $realisateur['id_realisateur'] ?>"><?= $realisateur['nom_realisateur']." ".$realisateur['prenom_realisateur'] ?></option>
            <?php } ?>
        </select>

    <label for="annee_sortie">Année</label>
    <input class="uk-input" type="int" name="annee_sortie" required>

    <label for="id_genre">Genre</label>
    <select class="uk-select" name="id_genre" id="id_genre" multiple><?php 
        
        
            while($genre = $genres->fetch(PDO::FETCH_ASSOC))
            {?>
                <option value="<?= $genre['id_genre'] ?>"><?= $genre['libelle'] ?></option>
            <?php } ?>
    </select>

    <input class="uk-button uk-margin-top" type="submit" value="Ajouter">
</form>

<?php

$titre = "Ajouter un Film";
$contenu = ob_get_clean();
require "views/template.php";