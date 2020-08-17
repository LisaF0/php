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
        $sql = "SELECT f.id_film, titre, annee_sortie, note, TIME_FORMAT(SEC_TO_TIME(duree*60), '%H:%i') AS dureeHM, GROUP_CONCAT(libelle SEPARATOR ', ') AS genres, 
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
        $sql = "SELECT affiche, titre, annee_sortie, TIME_FORMAT(SEC_TO_TIME(duree*60),'%H:%i') AS dureeHM, note, synopsis
                    FROM film  
                    WHERE id_film = :id 
                    ORDER BY titre";
        $film = $dao->executerRequete($sql, [":id" => $id]);
        $casting = $this->getCasting($id);
        require 'views/film/detailFilm.php';
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

    public function addFilm($array){
        if(!empty($_POST)){
            $titre = "titre";
            $annee_sortie = filter_input(INPUT_POST, 'annee_sortie', FILTER_SANITIZE_NUMBER_INT);
            $id_realisateur = "id_realisateur";
            $genre = "libelle";
            

            if($titre && $annee_sortie){
                $dao = new DAO;
                $sql = 'INSERT INTO film (titre, annee_sortie, id_realisateur) '.
                "VALUES (:titre, :annee_sortie, :id_realisateur)";
                $array = [":titre" => $titre,
                ":annee_sortie" => $annee_sortie,
                ":id_realisateur" => $id_realisateur,
                //":genre" => $genre,
                ];
                

                $addFilm = $dao->executerRequete($sql, $array);
                var_dump($_POST);
                
                // header("Location: index.php?action=listFilms");
                // require 'views/film/listFilms.php';
            }
        }
    }
}
