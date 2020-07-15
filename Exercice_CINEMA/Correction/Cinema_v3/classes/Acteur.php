<?php

/**
 * Class Acteur
 */
class Acteur extends Personne {

    private $castings; // Filmographie d'un acteur (objet Casting)

    // Constructeur
    /**
     * @param [string] $nom
     * @param [string] $prenom
     * @param [string] $sexe
     * @param [string] $dateNaissance
     */
    public function __construct(string $nom = "N/A", string $prenom = "N/A", string $sexe = "N/A", string $dateNaissance = "now"){
        // héritage du constructeur de Personne
        parent::__construct($nom, $prenom, $sexe, $dateNaissance);
        $this->castings = [];
    }

    // Getters et setters    
    /**
     * getCastings
     *
     * @return void
     */
    public function getCastings(){
        return $this->castings;
    }
    
    /**
     * ajouterCasting
     *
     * @param  mixed $c
     * @return void
     */
    public function ajouterCasting(Casting $c){
        $this->castings[] = $c; 
    }
    
    /**
     * __toString
     *
     * @return void
     */
    public function __toString(){
        return $this->getPrenom()." ".$this->getNom();
    }
    
    /**
     * afficherRoles
     *
     * @return void
     */
    public function afficherRoles(){
        echo "<h3>Liste des films de <strong>".$this."</strong></h3>";
        foreach($this->getCastings() as $role){
            echo "<strong>".$role->getRole()->getNomRole()."</strong> dans ".
                $role->getFilm()->getTitre()." (".
                $role->getFilm()->getDateSortieFrance()->format('Y').")<br/>";
        }
    }
}