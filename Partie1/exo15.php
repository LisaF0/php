<?php

Class Personne{
    private $_nom;
    private $_prenom;
    private $_birthDay;

    public function __construct($nom, $prenom, $birthDay){
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_birthDay = $birthDay;
    }
    public function getNom(){
        return $this->_nom." ";
    }
    public function getPrenom(){
        return $this->_prenom." ";
    }
    public function getAge(){
        $today = new DateTime();
        $birthDay = new DateTime($this->_birthDay);
        $age = $birthDay->diff($today);
        return "a ".$age->format('%y ans<br>');
    }
    public function __toString(){
        return $this->getPrenom().$this->getNom().$this->getAge();

    }
}
$p1 = new Personne("DUPONT","Michel","1980-02-19");
$p2 = new Personne("DUCHEMIN","Alice","1985-01-17");

echo $p1->__toString();
echo $p2->__toString();





