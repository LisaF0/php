<?php
$age = 36;
$sexe = "H";

if ($sexe == "H" && $age > 20 || $sexe == "F" && $age >= 18 && $age <= 35 ){
    echo "Age : ".$age."<br>Sexe : ".$sexe."<br> La personne est imposable.";
} else {
    echo "Age : ".$age."<br>Sexe : ".$sexe."<br> La personne n'est pas imposable.";
}