<?php

class Personne{
    private $nom;
    private $prenom;
    private $birthDay;

    public function __construct(string $nom = "N/A", string $prenom = "N/A", string $birthDay = "now")
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->birthDay = $birthDay;
    }

        /**
         * Get the value of nom
         */ 
        public function getNom()
        {
                return $this->nom;
        }

        /**
         * Set the value of nom
         *
         * @return  self
         */ 
        public function setNom($nom)
        {
                $this->nom = $nom;

                return $this;
        }

        /**
         * Get the value of prenom
         */ 
        public function getPrenom()
        {
                return $this->prenom;
        }

        /**
         * Set the value of prenom
         *
         * @return  self
         */ 
        public function setPrenom($prenom)
        {
                $this->prenom = $prenom;

                return $this;
        }

        /**
         * Get the value of birthDay
         */ 
        public function getBirthDay()
        {
                return $this->birthDay;
        }

        /**
         * Set the value of birthDay
         *
         * @return  self
         */ 
        public function setBirthDay($birthDay)
        {
                $this->birthDay = $birthDay;

                return $this;
        }

        public function getAge(){
            $today = new DateTime("now");
            return $this->birthDay->diff($today)->format("%Y");
        }

        public function __toString()
        {
            return $this->getPrenom()." ".$this->getNom()."(".$this->getAge().")";
        }
}