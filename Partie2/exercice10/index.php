<?php

$infoGeneral = array("Nom", "Prénom", "Email" , "Ville");
$genreRadio = array("Masculin", "Féminin", "Autre");
$intituleFormation = array("Développeur Logiciel"=>"checked", "Designer Web"=>"unchecked", "Intégrateur"=>"unchecked", "Chef de projet"=>"unchecked");

function formInfoGeneral($infoGeneral){
    $resultat = "";
    foreach($infoGeneral as $value){
        $resultat .= "
                    <label for='$value'>$value: </label><br>
                    <input type='text' id='$value' name='$value'><br>
                    ";
    }
    return $resultat;
}

function afficherGenre($genreRadio){
    $genre = "";
    foreach($genreRadio as $value){
        $genre .= "<input type='radio' id='$value' name='genre' value='$value'>
        <label for='$value'>$value</label><br>";
    }
    return $genre;
}

function afficherFormation($intituleFormation){
    $formation = "";
    foreach($intituleFormation as $nom => $value){
        $formation .= "<input type='checkbox' id='$nom' name='$nom' $value>
        <label for='$nom'>$nom</label><br>";
    }
    return $formation;
}

function submit(){
    $submit ="<input type='submit' value='Envoyer'>";
    return $submit;
}
function afficheForm($infoGeneral, $genreRadio, $intituleFormation){
   return "<form action=''".formInfoGeneral($infoGeneral).afficherGenre($genreRadio).afficherFormation($intituleFormation).submit()."</form>";

}


echo afficheForm($infoGeneral, $genreRadio, $intituleFormation);

