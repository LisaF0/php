<?php
namespace Model\Entity;

use App\AbstractEntity;

class Topic extends AbstractEntity{
    private $id;
    private $title;
    private $creationdate;
    private $closed;
    private $resolved;
    private $user;

    public function __construct($data){
        parent::hydrate($data, $this);
    }


        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of title
         */ 
        public function getTitle()
        {
                return $this->title;
        }

        /**
         * Set the value of title
         *
         * @return  self
         */ 
        public function setTitle($title)
        {
                $this->title = $title;

                return $this;
        }

        /**
         * Get the value of creationdate
         */ 
        public function getCreationdate()
        {
                setLocale(LC_ALL, 'fr_FR.utf-8');
                return strftime("%d/%m/%Y", strtotime($this->creationdate));
        }

        /**
         * Set the value of creationdate
         *
         * @return  self
         */ 
        public function setCreationdate($creationdate)
        {
                $this->creationdate = $creationdate;

                return $this;
        }

        /**
         * Get the value of closed
         */ 
        public function getClosed()
        {
                return $this->closed;
        }

        /**
         * Set the value of closed
         *
         * @return  self
         */ 
        public function setClosed($closed)
        {
                $this->closed = $closed;

                return $this;
        }

        /**
         * Get the value of resolved
         */ 
        public function getResolved()
        {
                return $this->resolved;
        }

        /**
         * Set the value of resolved
         *
         * @return  self
         */ 
        public function setResolved($resolved)
        {
                $this->resolved = $resolved;

                return $this;
        }

        /**
         * Get the value of user
         */ 
        public function getUser()
        {
                return $this->user;
        }

        /**
         * Set the value of user
         *
         * @return  self
         */ 
        public function setUser($user)
        {
                $this->user = $user;

                return $this;
        }

        public function __toString(){
            return $this->getTitle();
        }
}