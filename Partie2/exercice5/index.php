<?php

$nomsInput = array("Nom","Prénom","Ville");

function afficherInput($nomsInput){
    $form="";
    foreach($nomsInput as $value){
        $form .= 
        "<form action=''>
            <label for='$value'>$value</label><br>
            <input type='text' id='$value' name='$value'><br>"
        ;
    }
    return $form;
}




echo afficherInput($nomsInput);
