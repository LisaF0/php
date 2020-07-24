<?php

class Acteur extends Personne{
    private $castings;
    
    public function __construct(string $nom = "N/A", string $prenom = "N/A", string $birthday = "now")
    {
        parent::__construct($nom, $prenom, $birthday);
        $this->castings = [];
    }

    public function addCastings(Casting $casting){
        $this->castings[] = $casting;
    }

    public function getCasting(){
        $allCastings = "<ul>";
        foreach($this->castings as $casting){
            $allCastings .= "<li>".$casting->getRole()." dans ".$casting->getFilm()."</li>";
        }
        return $this." a joué :".$allCastings;
    }

}