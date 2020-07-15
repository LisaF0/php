<?php

/**
 * Class Personne (abstract)
 */
abstract class Personne {

    // Attributs
    private $nom;
    private $prenom;
    private $sexe;
    private $dateNaissance;

    // Constructeur
    /**
     * @param [string] $nom
     * @param [string] $prenom
     * @param [string] $sexe
     * @param [string] $dateNaissance
     */
    public function __construct(string $nom = "N/A", $prenom = "N/A", $sexe = "N/A", $dateNaissance = "now"){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->sexe = $sexe;
        $this->dateNaissance = new DateTime($dateNaissance);
    }

    // Getters et setters    
    /**
     * getNom
     *
     * @return void
     */
    public function getNom(){
        //mb_strtoupper convertit en majuscules (prise en change des accents)
        return mb_strtoupper($this->nom);
    }
           
    /**
     * getPrenom
     *
     * @return void
     */
    public function getPrenom(){
        //ucfirst met le 1er caractère en majuscule
        return ucfirst($this->prenom); 
    }
    
    /**
     * getSexe
     *
     * @return void
     */
    public function getSexe(){
        return $this->sexe;
    }
    
    /**
     * getDateNaissance
     *
     * @return void
     */
    public function getDateNaissance(){
        return $this->dateNaissance->format('d/m/Y');
    }
    
    /**
     * getAge
     *
     * @return void
     */
    public function getAge(){
        $today = new DateTime("now");
        return $this->dateNaissance->diff($today)->format("%Y");
    }
    
    /**
     * __toString
     *
     * @return void
     */
    public function __toString(){
        return $this->getPrenom()." ".$this->getNom();
    }
}