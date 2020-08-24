<?php

namespace Model\Entity;

use App\AbstractEntity;

class Post extends AbstractEntity{
    private $id_message;
    private $texte;
    private $date_message;
    private $user_id;
    private $topic_id;

    public function __construct($data){
        parent::hydrate($data, $this);
    }
        

        /**
         * Get the value of id_message
         */ 
        public function getId_message()
        {
                return $this->id_message;
        }

        /**
         * Set the value of id_message
         *
         * @return  self
         */ 
        public function setId_message($id_message)
        {
                $this->id_message = $id_message;

                return $this;
        }

        /**
         * Get the value of texte
         */ 
        public function getTexte()
        {
                return $this->texte;
        }

        /**
         * Set the value of texte
         *
         * @return  self
         */ 
        public function setTexte($texte)
        {
                $this->texte = $texte;

                return $this;
        }

        /**
         * Get the value of date_message
         */ 
        public function getDate_message()
        {
                return $this->date_message;
        }

        /**
         * Set the value of date_message
         *
         * @return  self
         */ 
        public function setDate_message($date_message)
        {
                $this->date_message = $date_message;

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

        public function __toString(){
            return $this->getTexte();
        }
}