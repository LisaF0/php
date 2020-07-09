<?php

$voitures = ["Peugeot","Mercedes","Renault","BMW"];
$nbVoitures = count($voitures);

var_dump($voitures);  // pensez à faire des var_dump de temps en temps pour tester vos variables et leur contenu !

echo "Il y a $nbVoitures voitures dans le tableau<br>";
echo "Il y a ".count($voitures)." voitures dans le tableau<br>";

// Méthode FOR
echo "<ul>";
for($i = 0; $i < $nbVoitures; $i++) {
    echo "<li>".$voitures[$i]."</li>";
}
echo "</ul>";

// Méthode foreach (à privilégier)
foreach ($voitures as $marque){ //$marque = 1 élément du tableau
    echo $marque."<br>"; // oui j'ai eu la flemme de faire mes <li></li> !
}

// echo implode($voitures,"<br>");