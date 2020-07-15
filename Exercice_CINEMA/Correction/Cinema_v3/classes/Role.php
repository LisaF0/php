<?php

/**
 * Class Role
 */
class Role {

    // Attributs
    private $nomRole; // Nom du personnage
    private $castings; // liste des acteurs ayant joué le rôle dans tel film (objet Casting)

    // Constructeur
    /**
     * @param [string] $nomRole
     */
    public function __construct(string $nomRole = "N/A"){
        $this->nomRole = $nomRole;
        $this->castings = [];
    }

    // Getters et setters    
    /**
     * getNomRole
     *
     * @return void
     */
    public function getNomRole(){
        return $this->nomRole;
    }
    
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
     * @param  Casting $c
     * @return void
     */
    public function ajouterCasting(Casting $c){
        $this->castings[] = $c;
        // array_push
    }
    
    /**
     * afficherCasting
     *
     * @return void
     */
    public function afficherCasting(){
        echo "<h3>Liste des acteurs qui ont incarnés <strong>".$this->getNomRole()."</strong></h3>";
        if(count($this->getCastings()) > 0){
            foreach($this->getCastings() as $casting){
                echo "<strong>".$casting->getActeur()."</strong> dans ".
                    $casting->getFilm()->getTitre()." (".
                    $casting->getFilm()->getDateSortieFrance()->format('Y').")<br/>";
            }
        }else{
            echo "Aucun acteur défini pour ce rôle";
        }
        
    }
}