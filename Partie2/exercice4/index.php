<?php

$capitales = array ("France"=>"Paris","Allemagne"=>"Berlin","USA"=>"Washington","Italie"=>"Rome");

function afficherTableHTML($capitales){
    asort($capitales);
    
    foreach ($capitales as $pays => $capitale) {
        $url = "'https://fr.wikipedia.org/wiki/".$capitale."'";
        $tableContent .= 
        "<tr>
            <td>".strtoupper($pays)."</td>
            <td>".$capitale."</td>
            <td><a href=$url target='blank'>$url</a></td>
        </tr>";
    }

    return "<table border='1' style='border-collapse:collapse;'>
        <thead>
            <tr>
                <th>Pays</th>
                <th>Capitale</th>
                <th>Lien</th>
            <tr>
        </thead>
        <tbody>".$tableContent."</tbody>
    </table>";
}

echo afficherTableHTML($capitales);

// $capitales = [
// 	"France" => "Paris",
// 	"Allemagne" => "Berlin",
// 	"USA" => "Washington",
// 	"Italie" => "Rome"
// ];

// echo afficherTableHTML($capitales);

// function afficherTableHTML($capitales) {
// 	// trier par pays (A à Z)
//     ksort($capitales);
// 	$resultat = 
// 		"<table class='uk-table uk-table-striped'>
//     		<thead>
//     			<tr>
//     				<th>Pays</th>
//     				<th>Capitale</th>
//     			</tr>
// 			</thead>
// 			<tbody>";
// 		// boucle pour afficher les pays + capitales
//     	foreach($capitales as $pays => $capitale) {
// 			$resultat .= 
// 				"<tr>
// 					<td>".mb_strtoupper($pays)."</td>
// 					<td>$capitale</td>
// 				</tr>";
//     	}
//     $resultat .= "</tbody></table>";
//     return $resultat;
// }
