<?php

$dateDeNaissance = new DateTime('17-01-1985'); 
$today = new DateTime(); // date du jour
$age = $dateDeNaissance->diff($today);
echo "Age de la personne : ";
echo $age->format('%y ans %m mois %d jours');  



