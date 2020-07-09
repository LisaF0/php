<?php
$montantAPayer = 152;
$montantVerse = 200;
$resteAPayer = $montantVerse - $montantAPayer;


$rendueDe10 = intdiv($resteAPayer, 10);
$resteAPayer = $resteAPayer - (10*$rendueDe10);
$rendueDe5 = intdiv($resteAPayer, 5);
$resteAPayer = $resteAPayer - (5*$rendueDe5);
$rendueDe2 = intdiv($resteAPayer, 2);
$resteAPayer = $resteAPayer - (2*$rendueDe2);
$rendueDe1 = intdiv($resteAPayer, 1); 


echo "Montant à payer : ".$montantAPayer." € <br>Montant versé : ".$montantVerse." €<br>Reste à payer : ".$resteAPayer." €<br>******************************************<br>Rendue de monnaie : <br>".$rendueDe10." billets de  10 € - ".$rendueDe5." billets de 5 € - ".$rendueDe2." pièces de 2 € - ".$rendueDe1." pièces de 1 €";
