<?php ob_start(); ?>

<h2>Ajouter un acteur</h2>

<form action="index.php?action=addActeurOK" method="POST">
    <label for="nom_acteur">Nom acteur</label>
    <input class="uk-input" type="text" name="nom_acteur" id="nom_acteur" required>

    <label for="prenom_acteur">Prénom acteur</label>
    <input class="uk-input" type="text" name="prenom_acteur" id="prenom_acteur" required>

    <p>Sexe:<br>
        <input  type="radio" name="sexe_acteur" id="masculin" value="masculin">
        <label for="masculin">Masculin</label><br>
        <input  type="radio" name="sexe_acteur" id="féminin" value="féminin">
        <label for="féminin">Féminin</label>
    </p>
    <label for="birthday_acteur">Date de naissance</label>
    <input class="uk-input" type="date" id="birthday_acteur" name="birthday_acteur">

    <input class="uk-button uk-margin-top" type="submit" value="Ajouter">
</form>

<?php

$titre = "Ajouter un acteur";
$contenu = ob_get_clean();
require "views/template.php";