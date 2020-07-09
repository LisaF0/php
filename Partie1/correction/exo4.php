<?php

$phrase = "Engage le jeu que je le gagne";
$phraseLowRev = strtolower(strrev(str_replace(" ","",$phrase)));

/* 	strtolower : convertir une chaîne de caractères en minuscules
	str_replace : remplacer un mot par un autre dans une chaîne de caractères (ici pour supprimer l'espace)
	strrev : inverse le sens d'une chaîne de caractères
*/

if(strtolower(str_replace(" ","",$phrase)) == $phraseLowRev){
    echo "La phrase est palindrome";
}else{
    echo "La phrase est non palindrome";
}