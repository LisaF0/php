<?php

class Realisateur extends Personne{
    private $films;
    
    public function __construct(string $nom = "N/A", string $prenom = "N/A", string $birthday = "now")
    {
        parent::__construct($nom, $prenom, $birthday);
        $this->films = [];
    }

    public function addFilms(Film $film){
        $this->films[] = $film;
    }

    public function getFilms(){
        $allFilms = "<ul>";
        foreach($this->films as $film){
            $allFilms .= "<li>".$film->getTitre()."</li>";
        }
        return $this->getNom()." ".$this->getPrenom()." a réalisé :".$allFilms."</ul>";
    }
}
