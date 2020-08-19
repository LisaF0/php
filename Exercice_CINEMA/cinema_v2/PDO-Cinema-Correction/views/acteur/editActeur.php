<?php 
    ob_start(); 
    $detailActeur = $acteur->fetch();
?>

<h2>Editer un acteur</h2>

<form action="index.php?action=editActeurOK&id=<?= $detailActeur["id_acteur"] ?>" method="POST">
    <label for="nom_acteur">Nom acteur</label>
    <input 
        class="uk-input" 
        type="text" 
        name="nom_acteur" 
        id="nom_acteur" 
        value=<?= $detailActeur["nom_acteur"] ?>
    >
    <label for="prenom_acteur">Prénom acteur</label>
    <input 
        class="uk-input" 
        type="text" 
        name="prenom_acteur" 
        id="prenom_acteur"
        value=<?= $detailActeur["prenom_acteur"] ?>
    >
    <input class="uk-button uk-margin-top" type="submit" value="Modifier">
</form>

<?php

$titre = "Ajouter un acteur";
$contenu = ob_get_clean();
require "views/template.php";