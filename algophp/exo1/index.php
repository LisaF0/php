<?php


include 'class/CompteBancaire.php';
include "class/Titulaire.php";

$titulaire1 = new Titulaire("MICHEL", "Jean", "28-05-1992", "Strasbourg");
$titulaire2 = new Titulaire("LI", "a", "28-05-1998", "Strasbourg");


$cB1 = new CompteBancaire("Livret A", 1800, "euros", $titulaire1);
$cB2 = new CompteBancaire("Compte courant", 1000, "euros", $titulaire1);
$cB3 = new CompteBancaire("Compte courant", 1000, "euros", $titulaire2);

$cB1->crediter(200);
$cB2->debiter(200);

$cB1->virement(300, $cB3);

var_dump($titulaire1);
var_dump($titulaire2);

// echo $titulaire1;

// echo $titulaire2;

echo $cB1;
