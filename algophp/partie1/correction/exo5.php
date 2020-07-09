<?php

$valeurFrancs = 1000000;
// $valeurEuros = round($valeurFrancs / 6.55957, 2);
$valeurEuros = number_format($valeurFrancs / 6.55957, 2, ",", " ");
// number_format permet de paramétrer plus de choses à l'affichage : séparateur de milliers ainsi que le symbole de la décimale (round() reste correct cependant)

echo "Montant en francs : $valeurFrancs francs<br> $valeurFrancs francs = $valeurEuros €";