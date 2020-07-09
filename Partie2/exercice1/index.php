<?php
$texte="Mon texte en  paramètre";
function convertirMajRouge($texte){
    return mb_strtoupper("<p style ='color:#FF0000'>".$texte."</p>"); // Mettre en majusucle (comprend aussi les accents)
}

echo convertirMajRouge($texte);