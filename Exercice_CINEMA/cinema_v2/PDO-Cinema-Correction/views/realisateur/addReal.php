<?php ob_start(); ?>

<h2>Ajouter un réalisateur</h2>

<form action="index.php?action=addRealisateurOK" method="POST">
    <label for="nom_realisateur">Nom réalisateur</label>
    <input class="uk-input" type="text" name="nom_realisateur" id="nom_realisateur">

    <label for="prenom_realisateur">Prénom réalisateur</label>
    <input class="uk-input" type="text" name="prenom_realisateur" id="prenom_realisateur">

    <p>Sexe:<br>
        <input  type="radio" name="sexe_realisateur" id="masculin" value="masculin">
        <label for="masculin">Masculin</label><br>
        <input  type="radio" name="sexe_realisateur" id="féminin" value="féminin">
        <label for="féminin">Féminin</label>
    </p>
    <label for="birthday_realisateur">Date de naissance</label>
    <input class="uk-input" type="date" id="birthday_realisateur" name="birthday_realisateur">
    <input class="uk-button uk-margin-top" type="submit" value="Ajouter">
</form>

<?php

$titre = "Ajouter un réalisateur";
$contenu = ob_get_clean();
require "views/template.php";