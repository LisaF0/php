<link rel="stylesheet" href="style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"></script>
<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=cinema_dl8_lf;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : '. $e->getMessage());
}

$reponse = $bdd->query('SELECT f.id_film, titre, nom_realisateur, note, annee_sortie, TIME_FORMAT(SEC_TO_TIME(duree*60), "%H:%i") AS duree, GROUP_CONCAT(libelle SEPARATOR ",  ") AS libelle
                        FROM film f, realisateur r, genre g, posseder_genre pg 
                        WHERE r.id_realisateur = f.id_realisateur 
                        AND pg.id_film = f.id_film 
                        AND g.id_genre = pg.id_genre
                        GROUP BY f.id_film 
                        ORDER BY annee_sortie DESC'); // on recupere le contenu de la table
$etoile = "<i class='fas fa-star'></i>";
$etoileVide = "<i class='far fa-star'></i>";




echo "<table>
<tr>
    <th>TITRE</th>
    <th>NOTE</th>
    <th>REALISATEUR</th>
    <th>ANNEE</th>
    <th>DUREE</th>
    <th>GENRES</th>
</tr>";
while ($donnees = $reponse->fetch()) // on affiche chaque entrée une à une
{

$noteInverse = 5-$donnees['note'];
?>
        <tr>
            <td><a href="pageFilm.php?id=<?= $donnees['id_film']?>"><?= $donnees['titre']?></a></td>
            <td class='etoiles'><?php echo str_repeat($etoile, $donnees['note']).str_repeat($etoileVide, $noteInverse) ?></td>
            <td><?php echo $donnees['nom_realisateur']?></td>
            <td><?php echo $donnees['annee_sortie']?></td>
            <td><?php echo $donnees['duree']?></td>
            <td><?php echo $donnees['libelle']?></td>
        </tr>
        
 <?php   
}
echo "</table>";

$reponse->closeCursor(); // termine le traitement de la requete

?>

