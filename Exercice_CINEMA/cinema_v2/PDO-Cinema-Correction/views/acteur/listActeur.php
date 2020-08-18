<?php ob_start(); ?>

<h2>Liste des acteurs</h2>
<a class="uk-button uk-button-primary" href="index.php?action=addActeur">Ajouter un acteur</a>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>NOM PRENOM</th>
        </tr>
    </thead>
    <tbody>

<?php

    while($acteur = $acteurs->fetch()) { ?>
        <tr>
            <td>
                <a href="index.php?action=detailActeur&id=<?= $acteur["id_acteur"] ?>"><?= $acteur["nom_acteur"]." ".$acteur["prenom_acteur"] ?></a>
            </td>
            
        </tr>

<?php }

$acteurs->closeCursor();

?>
    </tbody>
</table>

<?php

$titre = "Liste des Acteurs";
$contenu = ob_get_clean();
require "views/template.php";