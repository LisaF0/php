<?php

class Utilisateur{
    private $id_utilisateur;
    private $pseudo;
    private $mail;
    private $mdp;
    private $date_inscription;
    private $role;

    public function __construct(int $id_utilisateur, string $pseudo, string $mail, string $mdp, string $date_inscription, string $role){
        $this->id_utilisateur = $id_utilisateur;
        $this->pseudo = $pseudo;
        $this->mail = $mail;
        $this->mdp = $mdp;
        $this->date_inscription = $date_inscription;
        $this->role = $role;
    }
  


        /**
         * Get the value of id_utilisateur
         */ 
        public function getId_utilisateur()
        {
                return $this->id_utilisateur;
        }

        /**
         * Set the value of id_utilisateur
         *
         * @return  self
         */ 
        public function setId_utilisateur($id_utilisateur)
        {
                $this->id_utilisateur = $id_utilisateur;

                return $this;
        }

        /**
         * Get the value of pseudo
         */ 
        public function getPseudo()
        {
                return $this->pseudo;
        }

        /**
         * Set the value of pseudo
         *
         * @return  self
         */ 
        public function setPseudo($pseudo)
        {
                $this->pseudo = $pseudo;

                return $this;
        }

        /**
         * Get the value of mail
         */ 
        public function getMail()
        {
                return $this->mail;
        }

        /**
         * Set the value of mail
         *
         * @return  self
         */ 
        public function setMail($mail)
        {
                $this->mail = $mail;

                return $this;
        }

        /**
         * Get the value of mdp
         */ 
        public function getMdp()
        {
                return $this->mdp;
        }

        /**
         * Set the value of mdp
         *
         * @return  self
         */ 
        public function setMdp($mdp)
        {
                $this->mdp = $mdp;

                return $this;
        }

        /**
         * Get the value of date_inscription
         */ 
        public function getDate_inscription()
        {
                return $this->date_inscription;
        }

        /**
         * Set the value of date_inscription
         *
         * @return  self
         */ 
        public function setDate_inscription($date_inscription)
        {
                $this->date_inscription = $date_inscription;

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
        public function __toString(){
            return $this->getPseudo();
        }
}