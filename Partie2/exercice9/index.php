<?php
$nomsRadio = array("Masuculin", "Féminin", "Autre");

function afficherRadio($nomsRadio){
    $resultat = "<form action=''>";
    foreach($nomsRadio as $value){
        $resultat .= "
                    <input type='radio' id='$value' name='genre' value='$value'>
                    <label for='$value'>$value</label><br>
                    ";
    }
    return $resultat .="</form>";

}

echo afficherRadio($nomsRadio);