<?php

class Role{
    private $nomRole;
    private $castings;

    public function __construct(string $nomRole = "N/A")
    {
        $this->nomRole = $nomRole;
        $this->castings = [];
    }

    public function addCastings($casting){
        array_push($this->castings, $casting);
    }
    public function getRoleActeurs(){
        $totalRoleActeurs = "";
        foreach($this->castings as $casting){
            $totalRoleActeurs .="<ul><li>".$casting->getActeur()." (".$casting->getFilm().")</li></ul>";
        }
        return "Les acteurs de ".$this." sont : ".$totalRoleActeurs;
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
        public function __toString()
    {
        return $this->getNomRole();
    }
}
