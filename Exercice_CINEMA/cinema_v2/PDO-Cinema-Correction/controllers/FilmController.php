<?php

require 'bdd/DAO.php';
require 'controllers/RealisateurController.php';

class FilmController {
    
    /**
     * findAll
     *
     * @return void
     */
    public function findAll() {

        $dao = new DAO();
        $sql = "SELECT f.id_film, titre, annee_sortie, note, TIME_FORMAT(SEC_TO_TIME(duree*60), '%Hh%i') AS dureeHM, GROUP_CONCAT(libelle SEPARATOR ', ') AS genres, 
                CONCAT(prenom_realisateur,' ',nom_realisateur) AS rea
                FROM film f
                LEFT JOIN posseder_genre pg ON f.id_film = pg.id_film
                LEFT JOIN genre g ON g.id_genre = pg.id_genre
                LEFT JOIN realisateur r ON f.id_realisateur = r.id_realisateur
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
    public function findOneById($id, $edit = false) {

        $dao = new DAO();
        $sql = "SELECT id_film, affiche, titre, annee_sortie, TIME_FORMAT(SEC_TO_TIME(duree*60),'%H:%i') AS dureeHM, note, synopsis, duree, id_realisateur
                    FROM film  
                    WHERE id_film = :id 
                    ORDER BY titre";
        $film = $dao->executerRequete($sql, [":id" => $id]);
        $casting = $this->getCasting($id);
        

        if(!$edit){
            require 'views/film/detailFilm.php';
        } else {
            return $film;
        }
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



    public function formAddFilm(){
        $ctrlRealisateur = new RealisateurController();
        $realisateurs = $ctrlRealisateur->getRealisateurs();

        $ctrlGenre = new GenreController();
        $genres = $ctrlGenre->getGenres();

        require 'views/film/addFilm.php';
    }

    /**
     * formEditFilm
     * @param  mixed $id
     * @return void
     */
    public function formEditFilm($id) {

        $ctrlRealisateur = new RealisateurController();
        $realisateurs = $ctrlRealisateur->getRealisateurs();

        $ctrlGenre = new GenreController();
        $genres = $ctrlGenre->getGenres();

        $film = $this->findOneById($id, true);
        require "views/film/editFilm.php";
    }

    /**
     * deleteFilm
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteFilm($id) {

        $dao = new DAO();
        $sql2 = "DELETE FROM posseder_film WHERE id_film = :id";
        $dao->executerRequete($sql2, [
            ":id" => $id
        ]);
        $sql = "DELETE FROM film WHERE id_film = :id";
        $dao->executerRequete($sql, [
                ":id" => $id
            ]);
        header("Location: index.php?action=listFilms");
    }

    /**
     * editFilm
     *
     * @param  mixed $id
     * @param  mixed $array
     * @return void
     */
    public function editFilm($id, $array) {
        

        $titre = filter_input (INPUT_POST, "titre", FILTER_SANITIZE_STRING);
        $id_realisateur = $array["id_realisateur"];
        $annee_sortie = filter_input(INPUT_POST, 'annee_sortie', FILTER_SANITIZE_NUMBER_INT);
        $duree = filter_input(INPUT_POST, 'duree', FILTER_SANITIZE_NUMBER_INT);
        $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_INT);
        $synopsis = filter_input (INPUT_POST, "synopsis", FILTER_SANITIZE_STRING);
        // $genres = $array["id_genre"];

        $dao = new DAO();
        $sql = "UPDATE film 
                    SET titre = :titre,
                    id_realisateur = :id_realisateur,
                    annee_sortie = :annee_sortie,
                    duree = :duree,
                    note = :note,
                    synopsis = :synopsis
                    -- genres = :genres
                    WHERE id_film = :id
                    ";

        $dao->executerRequete($sql, [
            ":id" => $id,
            ":titre" => $titre,
            ":id_realisateur" => $id_realisateur,
            ":annee_sortie" => $annee_sortie,
            ":duree" => $duree,
            ":note" => $note,
            ":synopsis" => $synopsis
            // ":genres" => $genres
        ]);
        
    
                
        
        
        header("Location: index.php?action=listFilms");
    }

    public function addFilm($array){
        if(!empty($_POST)){
            $titre = filter_input (INPUT_POST, "titre", FILTER_SANITIZE_STRING);
            $annee_sortie = filter_input(INPUT_POST, 'annee_sortie', FILTER_SANITIZE_NUMBER_INT);
            $duree = filter_input(INPUT_POST, 'duree', FILTER_SANITIZE_NUMBER_INT);
            $note = filter_input(INPUT_POST, 'note', FILTER_SANITIZE_NUMBER_INT);
            $id_realisateur = $array["id_realisateur"];
            $genres = $array["id_genre"];
            $synopsis = filter_input (INPUT_POST, "synopsis", FILTER_SANITIZE_STRING);
            

            if($titre && $annee_sortie){
                $dao = new DAO;
                $sql = 'INSERT INTO film (titre, annee_sortie, id_realisateur, duree, note, synopsis) '.
                "VALUES (:titre, :annee_sortie, :id_realisateur, :duree, :note, :synopsis)";
                $array = [":titre" => $titre,
                ":annee_sortie" => $annee_sortie,
                ":id_realisateur" => $id_realisateur,
                ":duree" => $duree,
                ":note" => $note,
                ":synopsis" => $synopsis
                ];
                $dao->executerRequete($sql, $array);

                $dernierFilm = $dao->getBDD()->lastInsertID();

                $sql2 = 'INSERT INTO posseder_genre (id_film, id_genre)'.
                "VALUES (:id_film, :id_genre)";
                foreach($genres AS $genre){
                    $dao->executerRequete($sql2, [":id_film" => $dernierFilm,
                                                ":id_genre" => $genre]);
                }

                header("Location: index.php?action=listFilms");
                
            }
        }
    }
}
