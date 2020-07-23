<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=cinema_dl8_lf;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : '. $e->getMessage());
}

$reponse = $bdd->query('SELECT titre, nom_realisateur FROM film f, realisateur r WHERE r.id_realisateur = f.id_realisateur AND r.id_realisateur = 1 ORDER BY titre DESC'); // on recupere tout le ocntenu de la table jeux_video

while ($donnees = $reponse->fetch()) // on affiche chaque entrée une à une
{
echo $donnees['titre']." ".$donnees['nom_realisateur']."<br />";
    

}

$reponse->closeCursor(); // termine le traitement de la requete