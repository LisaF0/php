<?php

$capitales = array("France"=>"Paris", "Allemagne"=>"Berlin", "USA"=>"Washington", "Italie"=>"Rome");

function afficherTableHTML($capitales){
    asort($capitales);
    foreach ($capitales as $pays => $capitale){
        echo "$pays = $capitale<br>";
    }
}


afficherTableHTML($capitales);
var_dump($capitales);



