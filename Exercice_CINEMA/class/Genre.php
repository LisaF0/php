<?php

class Genre {
    private $nomGenre;
    private $films;

    public function __construct($nomGenre) {
        $this->nomGenre = $nomGenre;
        $this->films = [];
    }

    
    public function getNomGenre() {
        return $this->nomGenre;
    }

    public function setNomGenre($nomGenre) {
        $this->nomGenre = $nomGenre;
        return $this;
    }

    public function addGenre($film){
        array_push($this->films, $film);
    }

    public function getFilms(){
        $totalFilms = "";     
        foreach($this->films as $film){
                $totalFilms .= "<ul><li>".$film->getTitre()."</li></ul>"; // utilisé echo à la place de return car sinon il s'arrete après le premier film
        }
        return $this->getNomGenre()." : ".$totalFilms;

    }

    
    public function __toString() {
        return $this->nomGenre;
    }
}