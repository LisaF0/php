<?php

include 'class/Film.php';
include 'class/Genre.php';
include 'class/Realisateur.php';
//déclarer new genre;
$genre1 = new Genre("Comédie");
$genre2 = new Genre("Fantastique");
$genre3 = new Genre("Historique");

$realisateur1 = new Realisateur("ZEMECKIS", "Robert Lee", "14-05-1952");
$realisateur2 = new Realisateur("DARABONT", "Frank", "28-01-1959");
$realisateur3 = new Realisateur("SPIELBERG", "Steven", "18-12-1946");

$film1 = new Film("Forrest Gump", "28-10-2015", 140, "blablabla", $genre1, $realisateur1);
$film2 = new Film("La Ligne verte", "12-01-1999", 189, "blablabla", $genre2, $realisateur2);
$film3 = new Film("La Liste de Schindler", "13-03-2019", 195, "blablabla", $genre3, $realisateur3);


echo $film1;
echo $film2;
echo $film3;

var_dump($film1);
var_dump($film2);
var_dump($film3);