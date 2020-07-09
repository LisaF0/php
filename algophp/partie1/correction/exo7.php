<?php

$age = 5;
$cat = "";

switch(true){
    case $age >= 12: $cat = "Cadet"; break;
    case $age >= 10: $cat = "Minime"; break;
    case $age >= 8 : $cat = "Pupille"; break;
    case $age >= 6 : $cat = "Poussin"; break;
    default : $cat = "Non gérée";
}


echo "L'enfant qui a $age ans appartient à la catégorie : $cat";