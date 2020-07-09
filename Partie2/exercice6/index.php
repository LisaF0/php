<?php

$elements = array("Monsieur", "Madame", "Mademoiselle");

function alimenterListeDeroulante($elements){
    $resultat = "
                <form action=''>
                <label for='titre'>Choisi un titre: </label>
                <select name='titre' id='titre'>
                ";
    foreach($elements as $value){
        $resultat .= "
                
                <option value='$value'>$value</option>
                ";
    }
    $resultat .= "
                        </select>
                    </form>
                ";
    
    return $resultat;
}

echo alimenterListeDeroulante($elements);