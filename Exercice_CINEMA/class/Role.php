<?php

class Role{
    private $nomRole;
    private $acteur;
    private $film;

    public function __construt(string $nomRole = "N/A", Acteur $acteur, Film $film){
        $this->nomRole = $nomRole;
        $this->acteur = $acteur;
        $this->film = $film;

    }

        /**
         * Get the value of nomRole
         */ 
        public function getNomRole()
        {
                return $this->nomRole;
        }

        /**
         * Set the value of nomRole
         *
         * @return  self
         */ 
        public function setNomRole($nomRole)
        {
                $this->nomRole = $nomRole;

                return $this;
        }

        /**
         * Get the value of acteur
         */ 
        public function getActeur()
        {
                return $this->acteur;
        }

        /**
         * Set the value of acteur
         *
         * @return  self
         */ 
        public function setActeur($acteur)
        {
                $this->acteur = $acteur;

                return $this;
        }

        /**
         * Get the value of film
         */ 
        public function getFilm()
        {
                return $this->film;
        }

        /**
         * Set the value of film
         *
         * @return  self
         */ 
        public function setFilm($film)
        {
                $this->film = $film;

                return $this;
        }
}