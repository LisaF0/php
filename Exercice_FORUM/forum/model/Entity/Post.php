<?php

namespace Model\Entity;

use App\AbstractEntity;

class Post extends AbstractEntity{
    private $id;
    private $msg;
    private $creationdate;
    private $user;
    private $topic;

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
         * Get the value of msg
         */ 
        public function getMsg()
        {
                return $this->msg;
        }

        /**
         * Set the value of msg
         *
         * @return  self
         */ 
        public function setMsg($msg)
        {
                $this->msg = $msg;

                return $this;
        }

        /**
         * Get the value of creationdate
         */ 
        public function getCreationdate()
        {
                setLocale(LC_ALL, 'fr_FR.utf-8');
                return strftime("%d/%m/%Y %H:%M:%S", strtotime($this->creationdate));
                
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

        /**
         * Get the value of topic
         */ 
        public function getTopic()
        {
                return $this->topic;
        }

        /**
         * Set the value of topic
         *
         * @return  self
         */ 
        public function setTopic($topic)
        {
                $this->topic = $topic;

                return $this;
        }

        public function __toString(){
            return $this->getMsg();
        }
}