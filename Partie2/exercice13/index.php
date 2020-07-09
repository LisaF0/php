<?php

include 'class/Voiture.php';

$v1 = new Voiture("Peugeot", "408", 5);
$v2 = new Voiture("Citroën", "C4", 3);
var_dump($v1);
echo $v1."<br>";

echo $v1->demarrer();
echo $v1->accelerer(50);
echo $v2->demarrer();
echo $v2->stopper();
echo $v2->accelerer(20);
echo $v1->getVitesseActuelle();
echo $v2->getVitesseActuelle();


echo $v1;
echo $v2;




