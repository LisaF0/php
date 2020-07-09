<?php

$capitales = array("France"=>"Paris", "Allemagne"=>"Berlin", "USA"=>"Washington", "Italie"=>"Rome");

function afficherTableHTML($capitales){
    asort($capitales); // affiche le tableau dans l'ordre alphabétique des values(capitals ici)
    foreach ($capitales as $pays => $capitale){
        echo "$pays = $capitale<br>";
    }
}


afficherTableHTML($capitales);
var_dump($capitales);



