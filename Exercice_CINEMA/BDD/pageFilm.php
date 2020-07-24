<link rel="stylesheet" href="style.css">
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

$reponse = $bdd->query('SELECT titre, nom_realisateur, note, annee_sortie, TIME_FORMAT(SEC_TO_TIME(duree*60), "%H:%i") AS duree, GROUP_CONCAT(libelle SEPARATOR ",  ") AS libelle
                        FROM film f, realisateur r, genre g, posseder_genre pg 
                        WHERE r.id_realisateur = f.id_realisateur AND pg.id_film = f.id_film 
                        AND g.id_genre = pg.id_genre
                        GROUP BY f.id_film 
                        ORDER BY annee_sortie DESC'); // on recupere le contenu de la table
                        
