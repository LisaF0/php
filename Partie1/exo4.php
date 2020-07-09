<?php

$phrase = "Engage le jeu que je le gagne";

check_palindrome($phrase);

function check_palindrome($phrase){
    $phrase1 = preg_replace("/\s+/","",$phrase); // supprime tout les espaces del a chaine de caractères
    $phrase1 = strtolower($phrase1); // Met la chaine de caractère en minuscule
    $strrev = strrev($phrase1); // Retourne la chaine de caractère a l'envers
    
    if ($phrase1 == strrev($phrase1)){
        echo "La phrase ".$phrase." est un palindrome";
    } else {
        echo "La phrase ".$phrase." n'est pas un palindrome";
    }
}





