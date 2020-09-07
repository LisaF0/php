<?php

require 'bdd/DAO.php';

class FilmController {

    public function findAll() {

        $dao = new DAO();
        $sql = "SELECT id_film, titre_film, annee_film 
                    FROM film 
                    ORDER BY annee_film DESC";
        $films = $dao->executerRequete($sql);
        require 'views/listFilms.php';
    }

    public function findOneById($id) {

        $dao = new DAO();
        $sql = "SELECT titre_film, annee_film, TIME_FORMAT(SEC_TO_TIME(duree_film*60),'%H:%i') AS dureeHM,
                    resume_film
                    FROM film  WHERE id_film = :id 
                    ORDER BY titre_film";
        $film = $dao->executerRequete($sql, [":id" => $id]);
        require 'views/detailFilm.php';
    }
}