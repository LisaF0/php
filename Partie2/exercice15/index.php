<?php

$email = "elan@elan-formation.fr";



function validate_email($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        return "L'adresse ".$email." est une adresse e-mail valide";
    } else {
        return "L'adresse ".$email." est une adresse e-mail invalide";
    }
}


echo validate_email($email);