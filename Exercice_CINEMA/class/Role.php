<?php

class Role{
    private $nomRole;

    public function __construct(string $nomRole = "N/A"){
        $this->nomRole = $nomRole;
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

        
        public function __toString() {
                return $this->nomRole;
                        
            }
        
}