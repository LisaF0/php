<?php

require_once "controllers/FilmControllers.php";
require_once "controllers/ActeurControllers.php";
require_once "controllers/RealisateurControllers.php";
require_once "controllers/GenreControllers.php";
require_once "controllers/formControllers.php";
require 'bdd/DAO.php';


$ctrlFilm = new FilmControllers();
$ctrlActeur = new ActeurControllers();
$ctrlRealisateur = new RealisateurControllers();
$ctrlGenre = new GenreControllers();
$ctrlForm = new formControllers();


if(isset($_GET['action'])){

    switch($_GET['action']){
        case "listFilms" : $ctrlFilm->findAll(); break;
        case "detailFilm" : $ctrlFilm->findOneById($_GET['id']); break;
        case "detailActeur" : $ctrlActeur->findOneById($_GET['id']); break;
        case "addFilm" : $ctrlFilm->afficherForm(); break;
        case "addForm" : $ctrlForm->getForm($_POST); break;
        
    }
}else {
    $ctrlFilm->findAll();
}