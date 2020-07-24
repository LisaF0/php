<link rel="stylesheet" href="styleFilm.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"></script>
<a href="index.php"><i class="fas fa-arrow-circle-left"></i></a>
<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=cinema_dl8_lf;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : '. $e->getMessage());
}


$query = $bdd->query("SELECT titre, affiche, annee_sortie, note, synopsis
    FROM film f
    WHERE f.id_film = ".$_GET['id']);

$requete = $bdd->query("SELECT nom_acteur, prenom_acteur, nom_role
FROM casting c, film f, acteur a, role r
WHERE f.id_film = c.id_film
AND c.id_acteur = a.id_acteur
AND r.id_role = c.id_role
AND f.id_film = ".$_GET['id']);

$etoile = "<i class='fas fa-star'></i>";
$etoileVide = "<i class='far fa-star'></i>";

while ($donnees = $query->fetch())
{
    $noteInverse = 5-$donnees['note'];
    echo 
    "<img src='".
    $donnees['affiche']."'</br>".
    $donnees['titre']."</br></br>
    Année : ".$donnees['annee_sortie']."</br></br>
    Note : ".str_repeat($etoile, $donnees['note']).str_repeat($etoileVide, $noteInverse)."</br></br>".
    $donnees['synopsis']."</br></br>
    Casting</br><ul>"?><?php while($infocast = $requete->fetch()){
        echo "<li>".$infocast['nom_acteur']." ".$infocast['prenom_acteur']." (".$infocast['nom_role'].")</li>";
    }
    "</ul>";
}
    




                        
