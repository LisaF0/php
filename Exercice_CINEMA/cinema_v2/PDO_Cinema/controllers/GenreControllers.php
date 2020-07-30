<?php

// require 'bdd/DAO.php';

class GenreControllers{

    public function getGenre(){

        $dao = new DAO();
        $sql = "SELECT libelle
        FROM genre g
        ";
        return $genres = $dao->executerRequete($sql);

    
    }

}