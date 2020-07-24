<?php
    // Autoloader
    spl_autoload_register(function ($class) {
        require 'classes/'.$class.'.php';
    });
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/css/uikit.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit-icons.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>POO Cinema</title>
</head>
<body>
    <div class="uk-container uk-container-expand">
        <?php
            // Chargement de toutes les données instanciées dans data.php
            include 'data/data.php';

            // ********************** AFFICHAGE **********************
            // Films par réalisateur
            $mendes->afficherFilmographie();
            $campbell->afficherFilmographie();
            $lucas->afficherFilmographie();
            $peterjackson->afficherFilmographie();
            $spielberg->afficherFilmographie();
            $test->afficherFilmographie();

            // Films par genre
            $sf->listerFilms();
            
            // Rôles par acteur
            $markhamill->afficherRoles();
            $harrisonFord->afficherRoles();
            $danielCraig->afficherRoles();
            
            // Acteurs par rôle
            $luke->afficherCasting();
            $bond->afficherCasting();
            $testRole->afficherCasting();
            
            //Acteurs par films
            //Tous les acteurs des films Star Wars
            $i=4; while($i<=6){ ${"sw".$i}->afficherActeurs(); $i++; }
        ?>

        </div>
    </body>
</html>