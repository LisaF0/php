<?php ob_start(); ?>

<h2>Ajouter un Film</h2>

<form action="index.php?action=addRealisateurOK" method="POST">
    <label for="titre">Titre</label>
    <input class="uk-input" type="text" name="titre" required>

    <label for="id_realisateur">Réalisateur</label>
        <select name="id_realisateur" id="id_realisateur"><?php 
        var_dump($realisateurs);
        
            while($realisateur = $realisateurs->fetch(PDO::FETCH_ASSOC))
            {?>
                <option value="<?php $realisateur['id_realisateur'] ?>"><?= $realisateur['nom_realisateur']." ".$realisateur['prenom_realisateur'] ?></option>
            <?php } ?>
        </select>

    <label for="annee_sortie">Année</label>
    <input class="uk-input" type="int" name="annee_sortie" required>

    <label for="id_genre">Genre</label>
    <input class="uk-input" type="checkbox" name="id_genre" id="id_genre">



    <input class="uk-button uk-margin-top" type="submit" value="Ajouter">
</form>

<?php

$titre = "Ajouter un Film";
$contenu = ob_get_clean();
require "views/template.php";