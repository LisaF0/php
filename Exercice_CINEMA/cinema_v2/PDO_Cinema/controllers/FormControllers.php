<?php
// require "DAO.php";

class formControllers{
    public function getForm($array){
        if(!empty($_POST)){
            $titre = "titre";
            $annee_sortie = filter_input(INPUT_POST, 'annee_sortie', FILTER_SANITIZE_NUMBER_INT);
            $duree = filter_input(INPUT_POST, 'duree', FILTER_SANITIZE_NUMBER_INT);
            $note = "note";
            $synopsis = "synopsis";
            // $genre = "libelle";
            $realisateur = "realisateur";
            var_dump($_POST);            
        
            if($titre && $annee_sortie && $duree && $note){
                $dao = new DAO;
                $sql = 'INSERT INTO film (titre, annee_sortie, duree, synopsis, noten id_realisateur) '.
                "VALUES (:titre, :annee_sortie, :duree, :synopsis, :note, :realisateur)";
                $array = [":titre" => $titre,
                ":annee_sortie" => $annee_sortie,
                ":duree" =>$duree,
                ":synopsis" => $synopsis,
                ":note" => $note,
                ":realisateur" => $realisateur,
                ];
                // "INSERT INTO genre (libelle)".
                // "VALUES (:libelle)". 
                // "INSERT INTO realisateur (nom_realisateur, prenom_realisateur)". 
                // "VALUES (:nom_realisateur, :prenom_realisateur)";

                $addFilm = $dao->executerRequete($sql, [":array" => $array]);
                require 'views/detailFilm.php';
                echo "<p>Vous avez ajouté un nouveau film</p>";
                die();
              
                    
                    
                    // header("Location: index.php");
                    // echo "<p>Vous avez ajouté un nouveau film</p>";
                    // die();
        
            }
        }
        
    }
}
