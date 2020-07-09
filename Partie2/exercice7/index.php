<?php

$elements = array("Choix 1"=>"unchecked", "Choix 2"=>"checked", "Choix 3"=>"unchecked");

function genererCheckbox($elements){
    $resultat = "
        <form action=''>
         ";
    foreach($elements as $choix => $value ){
        $resultat .= "
        <input type='checkbox' id='$choix' name='$choix' $value>
        <label for='$choix'>$choix</label><br>
        ";
    }
    $resultat .= "
        </form>
        ";
        return $resultat;

}
echo genererCheckbox($elements);