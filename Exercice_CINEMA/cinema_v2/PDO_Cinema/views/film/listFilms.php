<?php
    ob_start();

?>

<h2>Liste des films</h2>
<h3>Nombre de film : <?= $films->rowCount()?></h3>
<a href="index.php?action=addFilm" class="addFilm">Ajouter un film</a>
<table><thead><tr>
    <th>TITRE</th>
    <th>NOTE</th>
    <th>REALISATEUR</th>
    <th>ANNEE</th>
    <th>DUREE</th>
    <th>GENRE(S)</th>
    <th>ACTIONS</th>
</tr></thead>
<?php
while($film = $films->fetch()){ 
    $etoile = "<i class='fas fa-star'></i>";
$etoileVide = "<i class='far fa-star'></i>";
    $noteInverse = 5-$film['note'];

    ?>

    <tr>
        <td>
            <a href="index.php?action=detailFilm&id=<?= $film["id_film"] ?>">
            <?= $film["titre"] ?></a>
        </td>
        <td>
            <?= str_repeat($etoile, $film['note']).str_repeat($etoileVide, $noteInverse) ?>
        </td>
        <td>
            <?= $film["nom_realisateur"]." ".$film["prenom_realisateur"] ?>
        </td>
        <td>
            <?= $film["annee_sortie"] ?>
        </td>
        <td>
            <?= $film["dureeHM"] ?>
        </td>
        <td>
            <?= $film["libelle"] ?>
        </td>
        <td>
            <button class="delete">DELETE</button>
            <button class="edit">EDIT</button>
        </td>
        
        
     
    </tr>
    

<?php } ?>
</table>
<?php
$films->closeCursor();

$titre = "Liste des films";
$contenu = ob_get_clean();
require "template.php";