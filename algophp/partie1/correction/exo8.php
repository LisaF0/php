<?php

$table = 8;

// Méthode FOR
for ($i=1; $i <= 10; $i++) { 
    echo "$i x $table = ". $i * $table . "<br>";
}

// METHODE WHILE
$i = 1;
while ($i <= 10){
    echo "$i x $table = ". $i * $table . "<br>";
    $i++;
}