<?php
namespace Modele\Entity;

use App\AbstractEntity;

class Topic extends AbstractEntity{
    private $id;
    private $title;
    private $creationdate;
    private $closed
    private $resolved;
    private $user;

    public function __construct($data){
        parent::hydrate($data, $this);
    }


        /**
         * Get the value of id_sujet
         */ 
        public function getId_sujet()
        {
                return $this->id_sujet;
        }

        /**
         * Set the value of id_sujet
         *
         * @return  self
         */ 
        public function setId_sujet($id_sujet)
        {
                $this->id_sujet = $id_sujet;

                return $this;
        }

        /**
         * Get the value of titre
         */ 
        public function getTitre()
        {
                return $this->titre;
        }

        /**
         * Set the value of titre
         *
         * @return  self
         */ 
        public function setTitre($titre)
        {
                $this->titre = $titre;

                return $this;
        }

        /**
         * Get the value of date_sujet
         */ 
        public function getDate_sujet()
        {
                return $this->date_sujet;
        }

        /**
         * Set the value of date_sujet
         *
         * @return  self
         */ 
        public function setDate_sujet($date_sujet)
        {
                $this->date_sujet = $date_sujet;

                return $this;
        }

        /**
         * Get the value of verouiller
         */ 
        public function getVerouiller()
        {
                return $this->verouiller;
        }

        /**
         * Set the value of verouiller
         *
         * @return  self
         */ 
        public function setVerouiller($verouiller)
        {
                $this->verouiller = $verouiller;

                return $this;
        }

        /**
         * Get the value of resolu
         */ 
        public function getResolu()
        {
                return $this->resolu;
        }

        /**
         * Set the value of resolu
         *
         * @return  self
         */ 
        public function setResolu($resolu)
        {
                $this->resolu = $resolu;

                return $this;
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

        public function __toString(){
            return $this->getTitre();
        }
}