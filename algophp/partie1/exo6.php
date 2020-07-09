<?php
$prixUnitaireDeLArticle = 9.99;
$quantite = 5;
$tva = 0.2;

$prixTotal = ($prixUnitaireDeLArticle * $quantite) + $tva*$prixUnitaireDeLArticle*$quantite;
echo "Prix unitaire de l'article : ".$prixUnitaireDeLArticle." €<br> Quantité : ".$quantite."<br> Taux de TVA : ".$tva."<br> Le montant de la facture à régler est de : ". $prixTotal." €";

