<?php

class Acteur extends Personne{
    private $castings;
    public function __construct($nom, $prenom, $birthday){
        parent::__construct($nom, $prenom, $birthday);
        $this->castings = [];
    }


    public function addCasting($casting){
        array_push($this->castings, $casting);
    }
    public function getCastings(){
        $totalCastings = "";
        foreach($this->castings as $casting){
            $totalCastings .="<ul><li>".$casting->getFilm()."(".$casting->getRole().")</li></ul>";
        }
        return $this." <br>Film(Role) :".$totalCastings;
    }
    public function getRoleListe(){
        $totalRoles = "";
        foreach($this->castings as $casting){
            $totalRoles .= "<ul><li>".$casting->getRole()."(".$casting->getFilm().")</li></ul>";
        }
        return "Listes des rôles(+Film) de ".$this." : ".$totalRoles;
    }
}