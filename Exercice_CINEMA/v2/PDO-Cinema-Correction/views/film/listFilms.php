<?php ob_start(); ?>

<h2>Liste des films</h2>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>TITRE</th>
            <th>REALISATEUR</th>
            <th>ANNEE</th>
            <th>GENRES</th>
        </tr>
    </thead>
    <tbody>

<?php

    while($film = $films->fetch()) { ?>
        <tr>
            <td>
                <a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>"><?= $film["titre_film"] ?></a>
            </td>
            <td><?= $film["rea"] ?></td>
            <td><?= $film["annee_film"] ?></td>
            <td><?= $film["genres"] ?></td>
        </tr>

<?php }

$films->closeCursor();

?>
    </tbody>
</table>

<?php

$titre = "Liste des films";
$contenu = ob_get_clean();
require "views/template.php";