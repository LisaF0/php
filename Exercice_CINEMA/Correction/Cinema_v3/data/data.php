<?php

// ********************** INSTANCIATIONS **********************
// GENRES
$sf = new Genre("Science-Fiction");
$fantastique = new Genre("Fantastique");
$aventure = new Genre("Aventure");
$espionnage = new Genre("Espionnage");
            
// REALISATEURS
$lucas = new Realisateur("LUCAS","Georges", "M", "1944-05-14");
$peterjackson = new Realisateur("JACKSON","Peter", "M", "1961-10-31");
$spielberg = new Realisateur("SPIELBERG","Steven", "M", "1946-12-18");
$mendes = new Realisateur("MENDES","Sam","M","1965-08-01");
$campbell = new Realisateur("CAMPBELL", "Martin", "M", "1943-10-24");
$test = new Realisateur("MURMANN","Mickael","M","1985-01-17");

// FILMS
$sw4 = new Film("Star Wars IV : Un nouvel espoir","1977-10-19", 121, "Synopsis", $lucas, $sf);
$sw5 = new Film("Star Wars V : L'empire contre attaque","1980-08-20", 124, "Synopsis", $lucas, $sf);
$sw6 = new Film("Star Wars VI : Le retour du Jedi","1983-10-19", 134, "Synopsis", $lucas, $sf);
$lotr1 = new Film("Le Seigneur des Anneaux : La Communauté de l'Anneau", "2001-12-19", 178, "Synopsis", $peterjackson, $fantastique);
$lotr2 = new Film("Le Seigneur des Anneaux : Les Deux Tours", "2002-12-10", 179, "Synopsis", $peterjackson, $fantastique);
$lotr3 = new Film("Le Seigneur des Anneaux : Le Retour du Roi", "2003-12-17", 201, "Synopsis", $peterjackson, $fantastique);
$jurassic = new Film("Jurassic Park", "1993-10-20", 127, "Synopsis", $spielberg, $aventure);
$casinoRoyale = new Film("Casino Royale", "2006-11-14", 145, "", $campbell, $espionnage);
$goldenEye = new Film("Golden Eye", "1995-12-20", 130, "", $campbell, $espionnage);
$spectre = new Film("Spectre", "2015-11-11", 150, "", $mendes, $espionnage);

// ACTEURS
$markhamill = new Acteur("hamill", "Mark", "M", "1951-09-25");
$carrieFisher = new Acteur("fisher", "Carrie", "F", "1956-10-21");
$harrisonFord = new Acteur("ford", "Harrison", "M", "1942-07-13");
$danielCraig = new Acteur("Craig", "Daniel","M","");
$pierceBrosnan = new Acteur("Brosnan", "Pierce", "M", "");
            
// ROLES
$luke = new Role("Luke Skywalker");
$leia = new Role("Princess Leia");
$hanSolo = new Role("Han Solo");
$bond = new Role("James Bond");
$testRole = new Role("Test");

// CASTINGS
$c1 = new Casting($markhamill, $luke, $sw4);
$c2 = new Casting($markhamill, $luke, $sw5);
$c3 = new Casting($harrisonFord, $hanSolo, $sw4);
$c5 = new Casting($carrieFisher, $leia, $sw4);
$c6 = new Casting($danielCraig, $bond, $casinoRoyale);
$c7 = new Casting($danielCraig, $bond, $spectre);
$c8 = new Casting($pierceBrosnan, $bond, $goldenEye);