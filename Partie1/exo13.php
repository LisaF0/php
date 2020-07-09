<?php

$notes = [10, 12, 8, 19, 3, 16, 11, 13, 9];
$moyenne = array_sum($notes)/count($notes);

echo "Les notes obtenues par l'élève sont : ".implode(" ",$notes)."<br>Sa moyenne générale est donc de :".number_format($moyenne, 2); 