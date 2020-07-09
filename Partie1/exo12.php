<?php
    bjr();


function bjr(){
    $arrayLangue = [
        "Mickaël" => "FRA",
        "Virgile" => "ESP",
        "Marie-Claire" => "ENG"
    ];
    ksort($arrayLangue);// tri le tableau par odre alphabétique des keys
    foreach ($arrayLangue as $prenom => $langue){
        if ($langue == "FRA"){
            echo "<br>Salut ".$prenom; 
        } else if($langue == "ESP"){
            echo "<br>Hola ".$prenom;
        } else if($langue == "ENG"){
            echo "<br>Hello ".$prenom;
        }
    } 
}



