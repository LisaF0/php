SELECT plaque_immatriculation
FROM voitures v, couleur cou, colorer co
WHERE v.id_voiture IN (
	SELECT v.id_voiture 
	FROM voitures v, couleur cou, colorer co
	WHERE v.id_voiture = co.id_voiture
	AND co.id_couleur = cou.id_couleur
	AND cou.nom_couleur = 'Rouge')	
AND v.id_voiture = co.id_voiture
AND co.id_couleur = cou.id_couleur
AND cou.nom_couleur = 'Gris'