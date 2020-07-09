<?php
$arrayMarqueDeVoiture = ["Peugeot", "Renault", "BMW", "Merecedes"];

echo "Il y a ".count($arrayMarqueDeVoiture)." marques de voitures dans le tableau :<br><li>".implode("<br><li>",$arrayMarqueDeVoiture);