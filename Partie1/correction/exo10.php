<?php

$aPayer = 152;
$verse = 200;
$reste = $verse - $aPayer;

// ***** Solution avec floor *****
$nb10 = floor($reste / 10);
$reste = $reste - 10 * $nb10;
$nb5 = floor($reste / 5);
$reste = $reste - 5 * $nb5;
$nb2 = floor($reste / 2);
$reste = $reste - 2 * $nb2;

echo "Billets de 10 : $nb10<br/>";
echo "Billets de 5 : $nb5<br/>";
echo "Pièces de 2 : $nb2<br/>";
echo "Pièces de 1 : $reste<br/>";

// ***** Solution avec intdiv *****
$resteBis = $verse - $aPayer;

$nb10 = intdiv($resteBis, 10);
$resteBis = $resteBis - 10 * $nb10;
$nb5 = intdiv($resteBis, 5);
$resteBis = $resteBis - 5 * $nb5;
$nb2 = intdiv($resteBis, 2);
$resteBis = $resteBis - 2 * $nb2;

echo "Billets de 10 : $nb10<br/>";
echo "Billets de 5 : $nb5<br/>";
echo "Pièces de 2 : $nb2<br/>";
echo "Pièces de 1 : $resteBis<br/>";