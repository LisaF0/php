<?php

class Realisateur extends Personne{
    private $films;

    public function __construct($nom, $prenom, $birthday){
        parent::__construct($nom, $prenom, $birthday);
        $this->films = [];
    }
    

    public function addFilms($film){
        array_push($this->films, $film);
    }

    public function getFilms(){
        $totalFilms = "";     
        foreach($this->films as $film){
                $totalFilms .= "<ul><li>".$film->getTitre()."</li></ul>"; // utilisé echo à la place de return car sinon il s'arrete après le premier film
        }
        return $this->getNom()." ".$this->getPrenom()." a réalisé : ".$totalFilms;

    }

    public function getInfos(){
        return $this->getNom()." ".$this->getPrenom();
    }

    public function __toString()
    {
        return $this->getInfos();
    }

}