<?php

// require 'bdd/DAO.php';
require 'RealisateurControllers.php';

class FilmControllers{

    public function findAll(){

        $dao = new DAO;
        $sql = 'SELECT f.id_film, titre, nom_realisateur, prenom_realisateur, note, annee_sortie, TIME_FORMAT(SEC_TO_TIME(duree*60), "%H:%i") AS dureeHM, GROUP_CONCAT(libelle SEPARATOR ",  ") AS libelle
        FROM film f, realisateur r, genre g, posseder_genre pg 
        WHERE r.id_realisateur = f.id_realisateur 
        AND pg.id_film = f.id_film 
        AND g.id_genre = pg.id_genre
        GROUP BY f.id_film 
        ORDER BY annee_sortie DESC
                ';
        $films = $dao->executerRequete($sql);
        require 'views/listFilms.php';
    }

    public function findOneById($id){

        $dao = new DAO();
        $sql = "SELECT affiche, titre, annee_sortie, TIME_FORMAT(SEC_TO_TIME(duree*60),'%H:%i') AS dureeHM, note, synopsis
                FROM film
                WHERE id_film = :id";
        $film = $dao->executerRequete($sql, [":id" => $id]);
        $casting = $this->getCasting($id);


        require 'views/detailFilm.php';
    }

    public function getCasting($id){

        $dao = new DAO;
        $sql = "SELECT a.id_acteur AS id_a, nom_acteur, prenom_acteur, nom_role
        FROM casting c, film f, acteur a, role r
        WHERE f.id_film = c.id_film
        AND c.id_acteur = a.id_acteur
        AND r.id_role = c.id_role
        AND f.id_film = :id"
                ;
        return $casting = $dao->executerRequete($sql, [":id" => $id]);
    }

    public function afficherForm(){
        $ctrlRealisateur = new RealisateurControllers();
        $realisateurs = $ctrlRealisateur->getRealisateur();

        $ctrlGenre = new GenreControllers();
        $genres = $ctrlGenre->getGenre();

        require 'views/form_addFilm.php';
    }


}