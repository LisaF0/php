<?php

// require 'bdd/DAO.php';

class RealisateurControllers{

    public function getRealisateur(){

        $dao = new DAO();
        $sql = "SELECT nom_realisateur, prenom_realisateur
        FROM realisateur r
        ";
        return $realisateurs = $dao->executerRequete($sql);

        
    }

}