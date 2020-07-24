<?php

spl_autoload_register(function ($class_name) {
    include "class/". $class_name . '.php';
});

// On doit pouvoir afficher :
// • tous les films d'un réalisateur ----OK
// • tous les films d'un acteur (film + nom du rôle)
// • tous les films d'un genre précis --- OK
// • la liste des rôles d'un acteur (nom du rôle et titre du film)
// • toutes les informations d'un film (titre, année, durée en HH:MM, genre, liste des acteurs (nom + prénom), réalisateur (nom + prénom))
// • la liste des acteurs ayant incarné un rôle précis (nom + prénom de l'acteur et film dans lequel le rôle a été incarné)


// Realisateurs
$realisateur1 = new Realisateur("ZEMECKIS", "Robert", "14-05-1952");
$realisateur2 = new Realisateur("DARABONT", "Frank", "22-08-1960");

// Acteurs
$th = new Acteur("Hanks","Tom", "02-12-1965");
$rw = new Acteur("Wright", "Robin", "30-01-1978");

// Genres
$comedie = new Genre("comedie");
$sf = new Genre("science fiction");
// Role
$roleA = new Role("roleA");
$roleB = new Role("roleB");




// Films
$film1 = new Film("Forrest Gump", "2015", 140, "blalba", $realisateur1 , $comedie);
$film2 = new Film("La Ligne verte", "2008", 180, "blabla", $realisateur2, $sf);
$film3 = new Film("Harry Potter", 2004, 160, "blabl", $realisateur1, $sf);

// Casting
$cast1 = new Casting($roleA, $film1, $th);
$cast2 = new Casting($roleA, $film1, $rw);
$cast3 = new Casting($roleB, $film2, $th);




echo $realisateur1->getFilms();
echo $th->getCastings();
echo $sf->getFilms();
echo $th->getRoleListe();
echo $film1->getInfos();
echo $roleA->getRoleActeurs();



// data.php contient toutes les instanciations
// index.php contient toutes les méthodes que l'on peut utiliser +include = data/data.php



