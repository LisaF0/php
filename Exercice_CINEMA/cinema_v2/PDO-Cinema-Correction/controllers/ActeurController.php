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
        $sql = "SELECT nom_acteur, prenom_acteur, id_acteur
                FROM acteur a
                ";
        $acteurs = $dao->executerRequete($sql);
        
        require 'views/acteur/listActeur.php';
    }

    public function findOneById($id, $edit = false){

        $dao = new DAO();
        $sql = "SELECT id_acteur, nom_acteur, prenom_acteur, sexe_acteur, YEAR(CURDATE())-YEAR(birthday_acteur) AS age
        FROM acteur a
        WHERE  a.id_acteur = :id";
        $acteur = $dao->executerRequete($sql, [":id" => $id]);
        
        $casting = $this->getCasting($id);

        if(!$edit){
            require 'views/acteur/detailActeur.php';
        } else {
            return $acteur;
        }      
    }

    public function getCasting($id){
        $dao = new DAO();
        $sql = "SELECT nom_role, titre, a.id_acteur AS id_a, f.id_film AS id_f , annee_sortie, f.id_film
        FROM casting c, film f, acteur a, role r
        WHERE f.id_film = c.id_film
        AND c.id_acteur = a.id_acteur
        AND r.id_role = c.id_role
        AND a.id_acteur = :id ";

    return $casting = $dao->executerRequete($sql, [":id" => $id]);

    }

    /**
     * formAddActeur
     *
     * @return void
     */
    public function formAddActeur() {

        require "views/acteur/addActeur.php";
    }

    /**
     * addActeur
     *
     * @param  mixed $array
     * @return void
     */
    public function addActeur($array) {

        $nom_acteur = filter_var($array["nom_acteur"], FILTER_SANITIZE_STRING);
        $prenom_acteur = filter_var($array["prenom_acteur"], FILTER_SANITIZE_STRING);
        $sexe_acteur = filter_input(INPUT_POST, 'sexe_acteur');
        $birthday_acteur = filter_input(INPUT_POST, 'birthday_acteur');

        
        $dao = new DAO();
        $sql = "INSERT INTO acteur(nom_acteur, prenom_acteur, sexe_acteur, birthday_acteur) 
                    VALUES (:nom_acteur, :prenom_acteur, :sexe_acteur, :birthday_acteur)";
        $dao->executerRequete($sql, [
                ":nom_acteur" => $nom_acteur,
                ":prenom_acteur" => $prenom_acteur,
                ":sexe_acteur" => $sexe_acteur,
                ":birthday_acteur" => $birthday_acteur
            ]);

        header("Location: index.php?action=listActeur");
    }

    /**
     * formEditActeur
     *
     * @param  mixed $id
     * @return void
     */
    public function formEditActeur($id) {

        $acteur = $this->findOneById($id, true);
        require "views/acteur/editActeur.php";
    }

    /**
     * editActeur
     *
     * @param  mixed $id
     * @param  mixed $array
     * @return void
     */
    public function editActeur($id, $array) {

        $nom_acteur = filter_var ($array["nom_acteur"], FILTER_SANITIZE_STRING);
        $prenom_acteur = filter_var ($array["prenom_acteur"], FILTER_SANITIZE_STRING);
        $sexe_acteur = filter_input(INPUT_POST, 'sexe_acteur');
        $birthday_acteur = filter_input(INPUT_POST, 'birthday_acteur');

        $dao = new DAO();
        $sql = "UPDATE acteur 
                    SET nom_acteur = :nom_acteur,
                    prenom_acteur = :prenom_acteur,
                    sexe_acteur = :sexe_acteur,
                    birthday_acteur = :birthday_acteur
                    WHERE id_acteur = :id";
        $dao->executerRequete($sql, [
            ":id" => $id,
            ":nom_acteur" => $nom_acteur,
            ":prenom_acteur" => $prenom_acteur,
            ":sexe_acteur" => $sexe_acteur,
            "birthday_acteur" => $birthday_acteur
        ]);

        header("Location: index.php?action=listActeur");
    }
    
    /**
     * deleteActeur
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteActeur($id) {

        $dao = new DAO();
        $sql = "DELETE FROM acteur WHERE id_acteur = :id";
        $dao->executerRequete($sql, [
                ":id" => $id
            ]);

        header("Location: index.php?action=listActeur");
    }


}