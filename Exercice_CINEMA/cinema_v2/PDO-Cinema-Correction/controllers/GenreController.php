<?php

// require 'bdd/DAO.php';

class GenreController {
    
    /**
     * findAll
     *
     * @return void
     */
    public function findAll() {

        $dao = new DAO();
        $sql = "SELECT id_genre, libelle
                    FROM genre
                    ORDER BY libelle";
        $genres = $dao->executerRequete($sql);
        require 'views/genre/listGenre.php';
    }

    /**
     * findOneById
     *
     * @param  mixed $id
     * @param  mixed $edit
     * @return void
     */
    public function findOneById($id, $edit = false) {

        $dao = new DAO();
        $sql = "SELECT id_genre, libelle
                    FROM genre
                    WHERE id_genre = :id";
        $genre = $dao->executerRequete($sql, [":id" => $id]);
        

        if(!$edit){
            require 'views/genre/detailGenre.php';
        } else {
            return $genre;
        }
    }
    
  
  
    /**
     * formAddGenre
     *
     * @return void
     */
    public function formAddGenre() {

        require "views/genre/addGenre.php";
    }
    
    /**
     * formEditGenre
     *
     * @param  mixed $id
     * @return void
     */
    public function formEditGenre($id) {
        
        $genre = $this->findOneById($id, true);
        require "views/genre/editGenre.php";
    }
    
    /**
     * addRealisateur
     *
     * @param  mixed $array
     * @return void
     */
    public function addGenre($array) {

        $libelle = filter_var ($array["libelle"], FILTER_SANITIZE_STRING);
        
        $dao = new DAO();
        $sql = "INSERT INTO genre(libelle) 
                    VALUES (:libelle)";
        $dao->executerRequete($sql, [
                ":libelle" => $libelle,
                
            ]);

        header("Location: index.php?action=listGenre");
    }
    
    /**
     * editGenre
     *
     * @param  mixed $id
     * @param  mixed $array
     * @return void
     */
    public function editGenre($id, $array) {

        $libelle = filter_var ($array["libelle"], FILTER_SANITIZE_STRING);
        

        $dao = new DAO();
        $sql = "UPDATE genre 
                SET libelle = :libelle
                WHERE id_genre = :id";
        $dao->executerRequete($sql, [
            ":id" => $id,
            ":libelle" => $libelle
        ]);

        header("Location: index.php?action=listGenre");
    }
    
    /**
     * deleteRealisateur
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteGenre($id) {

        $dao = new DAO();
        $sql = "DELETE FROM genre WHERE id_genre = :id";
        $dao->executerRequete($sql, [
                ":id" => $id
            ]);

        header("Location: index.php?action=listGenre");
    }

    public function getGenres(){

        $dao = new DAO();
        $sql = "SELECT libelle, id_genre
        FROM genre
        ";
        return $genres = $dao->executerRequete($sql);
    }

    public function getFilms(){
        $dao = new DAO();
        $sql = "SELECT titre
                FROM film f, genre g, posseder_genre pg
                WHERE f.id_film = pg.id_film
                AND g.id_genre = pg.id_genre
                AND g.id_genre = :id
        ";
        return $films = $dao->executerRequete($sql, [
            ":id" => $id
        ]);
        
    }
}