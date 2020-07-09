<?php

$age = 32;
$sexe = "F";

// on considère ici les conditions comme étant des booléens
$C1 = $age > 20 && $sexe == "M";
$C2 = $sexe == "F" && ($age >= 18 && $age <= 35);

// on teste si au moins l'une des 2 conditions est remplie (simplification du if de ce fait)
if($C1 || $C2){
    echo "imposable";
}else{
    echo "non imposable";
}

// autre méthode avec une écriture ternaire (remplace le if traditionnel et permet de gérer le tout en 6 lignes !)
$imp = ($C1 || $C2) ? "imposable" : "non imposable";
echo "La personne est : $imp";
