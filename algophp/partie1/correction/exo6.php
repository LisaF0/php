<?php

$prixUnitaire = 9.99;
$qte = 5;
$tauxTVA = 0.2;

$prixTTC = $prixUnitaire * $qte * (1 + $tauxTVA);
// factorisation du calcul du prix ttc, d'autres méthodes étaient acceptées


echo "PU : $prixUnitaire €<br>
     Qté : $qte articles<br>
     Taux TVA : " . $tauxTVA * 100 ." %<br>
     Le montant de la facture à régler est de $prixTTC €";