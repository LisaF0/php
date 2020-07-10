<?php
include 'class/Film.php';
include 'class/Acteur.php';
include 'class/Genre.php';
include 'class/Personne.php';
include 'class/Realisateur.php';
include 'class/role.php';

// On doit pouvoir afficher :
// • tous les films d'un réalisateur
// • tous les films d'un acteur (film + nom du rôle)
// • tous les films d'un genre précis
// • la liste des rôles d'un acteur (nom du rôle et titre du film)
// • toutes les informations d'un film (titre, année, durée en HH:MM, genre, liste des acteurs (nom + prénom), réalisateur (nom + prénom))
// • la liste des acteurs ayant incarné un rôle précis (nom + prénom de l'acteur et film dans lequel le rôle a été incarné)


// Films
$film1 = new Film("Forrest Gump", "2015", 140, "blalba.", $realisateur1 , $comedie);
$film2 = new Film("La Ligne verte", "2008", 180, "blabla", $realisateur2, $sf);
$film3 = new Film("harry potter", 2004, 160, "blabl", $realisateur1, $sf);


// Realisateurs
$realisateur1 = new Realisateur("ZEMECKIS", "Robert", "14-05-1952");
$realisateur2 = new Realisateur("DARABONT", "Frank", "22-08-1960");

// Acteurs
$th = new Acteur("Hanks","Tom", "02-12-1965");
$rw = new Acteur("Robin Wright", "Robin", "30-01-1978");

// Genres
$comedie = new Genre("comedie");
$sf = new Genre("science fiction");

