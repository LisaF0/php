<?php
$francs =  100;


$euro = $francs / 6.55957;


echo "Montant en francs : ".$francs."<br>".$francs." francs = ".number_format($euro, 2)." €"; // number format permet de choisir le format du chiffre (lechiffre, lenombre de décimal,)