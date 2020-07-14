<?php

class Casting{
    private $role;
    private $film;
    private $acteur;

    public function __construct(Role $role, Film $film, Acteur $acteur)
    {
        $this->role = $role;
        $this->film = $film;
        $this->acteur = $acteur;
        $acteur->addCasting($this);
        $film->addCasting($this);
        $role->addCasting($this);
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

        public function __toString()
        {
            return "Role : ".$this->getRole()."<br>
                    Film : ".$this->getFilm()."<br>
                    Acteur : ".$this->getActeur()."<br><br>";
        }


}