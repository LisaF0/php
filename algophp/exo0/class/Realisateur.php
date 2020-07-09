<?php

class Realisateur{
    private $nom;
    private $prenom;
    private $dateNaissance;


    public function __construct($nom, $prenom, $dateNaissance){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getAge(){
        $today = new DateTime();
        $dateNaissance = new DateTime($this->dateNaissance);
        $age = $dateNaissance->diff($today);
        return $age->format('%y ans');
    }

    public function __toString(){
        return $this->nom." ".$this->prenom.", ".$this->getAge();
    }
    
}