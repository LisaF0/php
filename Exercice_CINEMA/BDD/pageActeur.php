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

$query = $bdd->query("SELECT nom_acteur, prenom_acteur, nom_role, titre, a.id_acteur
FROM casting c, film f, acteur a, role r
WHERE f.id_film = c.id_film
AND c.id_acteur = a.id_acteur
AND r.id_role = c.id_role
AND a.id_acteur = ".$_GET['id1']);

$requete = $bdd->query("SELECT nom_acteur, prenom_acteur, sexe_acteur, YEAR(CURDATE())-YEAR(birthday_acteur) AS age
FROM acteur a
WHERE  a.id_acteur = ".$_GET['id1']);

while($infos = $requete->fetch())
{
    echo $infos['nom_acteur']." ".$infos['prenom_acteur']." (".$infos['age']." ans)<br>";
}
echo "Filmographie:";
while ($donnees = $query->fetch())
{
    echo "<li>".$donnees['titre']." (".$donnees['nom_role'].")</li>";

}
?>

