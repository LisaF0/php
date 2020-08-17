<?php

// require 'bdd/DAO.php';

class ActeurController{

    /**
     * findAll
     *
     * @return void
     */
    public function findAll() {

        $dao = new DAO();
        $sql = "SELECT nom_acteur, prenom_acteur
                FROM acteur a
                ";
        $acteurs = $dao->executerRequete($sql);
        require 'views/acteur/listActeur.php';
    }

    public function findOneById($id){

        $dao = new DAO();
        $sql = "SELECT nom_acteur, prenom_acteur, sexe_acteur, YEAR(CURDATE())-YEAR(birthday_acteur) AS age
        FROM acteur a
        WHERE  a.id_acteur = :id";
        $acteur = $dao->executerRequete($sql, [":id" => $id]);
        
        $films = $this->getFilms($id);


        require 'views/acteur/detailActeur.php';
    }

    public function getFilms($id){
        $dao = new DAO();
        $sql = "SELECT nom_role, titre, a.id_acteur AS id_a, f.id_film AS id_f , annee_sortie, f.id_film
        FROM casting c, film f, acteur a, role r
        WHERE f.id_film = c.id_film
        AND c.id_acteur = a.id_acteur
        AND r.id_role = c.id_role
        AND a.id_acteur = :id ";

        return $films = $dao->executerRequete($sql, [":id" => $id]);

    }


}