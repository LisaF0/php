<?php

$url = "http://my.mobirise.com/data/userpic/764.jpg";

function repeterImage($url, $N){
    $resultat = str_repeat("<img src='$url'/>", $N);
    return $resultat;

}

echo repeterImage($url, 5);