<?php

require 'bdd/DAO.php';

class FilmController {
    
    /**
     * findAll
     *
     * @return void
     */
    public function findAll() {

        $dao = new DAO();
        $sql = "SELECT f.id_film, titre, annee_sortie, GROUP_CONCAT(libelle SEPARATOR ', ') AS genres, 
            CONCAT(prenom_realisateur,' ',nom_realisateur) AS rea
                    FROM film f, genre g, posseder_genre gf, realisateur r
                    WHERE f.id_film = gf.id_film 
                    AND g.id_genre = gf.id_genre
                    AND f.id_realisateur = r.id_realisateur
                    GROUP BY f.id_film
                    ORDER BY annee_sortie DESC";
        $films = $dao->executerRequete($sql);
        require 'views/film/listFilms.php';
    }
    
    /**
     * findOneById
     *
     * @param  mixed $id
     * @return void
     */
    public function findOneById($id) {

        $dao = new DAO();
        $sql = "SELECT titre, annee_sortie, TIME_FORMAT(SEC_TO_TIME(duree*60),'%H:%i') AS dureeHM,
                    synopsis
                    FROM film  WHERE id_film = :id 
                    ORDER BY titre";
        $film = $dao->executerRequete($sql, [":id" => $id]);
        require 'views/film/detailFilm.php';
    }
}