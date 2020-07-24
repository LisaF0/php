<?php

class Casting{
    private $acteur;
    private $role;
    private $film;

    public function __construct(Acteur $acteur, Role $role, Film $film)
    {
        $this->acteur = $acteur;
        $this->role = $role;
        $this->film = $film;
        $acteur->addCastings($this);
        $role->addCastings($this);
        $film->addCastings($this);
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
         * Get the value of role
         */ 
        public function getRole()
        {
                return $this->role;
        }

        /**
         * Set the value of role
         *
         * @return  self
         */ 
        public function setRole($role)
        {
                $this->role = $role;

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

        public function __toString()
        {
            return "Role : ".$this->getRole()."<br>
                    Film : ".$this->getFilm()."<br>
                    Acteur : ".$this->getActeur()."<br><br>";
        }
}