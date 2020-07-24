<?php

class Genre{
    private $nomGenre;
    private $films;
    

    public function __construct(string $nomGenre = "N/A")
    {
        $this->nomGenre = $nomGenre;
        $this->films = [];
    }

        /**
         * Get the value of nomGenre
         */ 
        public function getNomGenre()
        {
                return $this->nomGenre;
        }

        /**
         * Set the value of nomGenre
         *
         * @return  self
         */ 
        public function setNomGenre($nomGenre)
        {
                $this->nomGenre = $nomGenre;

                return $this;
        }

        public function addFilms(Film $film){
            $this->films[] = $film;
        }
        public function GetFilms(){
            $allFilms = "<ul>";
            foreach($this->films as $film){
                $allFilms .= "<li>".$film->getTitre()."</li>";
            }
            return "Voici les films de ".$this->getNomGenre().$allFilms."</ul>";
        }
}