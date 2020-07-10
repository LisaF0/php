<?php

class Voiture{
    private $marque;
    private $modele;


    public function __construct($marque, $modele){
        $this->marque = $marque;
        $this->modele = $modele;
    }

    public function getMarque()
    {
        return $this->marque;
    }
    public function setMarque($marque)
    {
        $this->marque = $marque;
        return $this;
    }

    public function getModele()
    {
        return $this->modele;
    }
    public function setModele($modele)
    {
        $this->modele = $modele;
        return $this;
    }
    public function getInfos(){
        return $this->getMarque()." ".$this->getModele();     
    }

    
    
}

class VoitureElec extends Voiture{
    private $autonomie;

    public function __construct($marque, $modele, $autonomie){
        parent::__construct($marque, $modele);
        $this->autonomie = $autonomie;
    }

    public function getAutonomie()
    {
        return $this->autonomie;
    }
    public function setAutonomie($autonomie)
    {
        $this->autonomie = $autonomie;

        return $this;
    }

    public function getInfos(){
        
        return parent::getInfos()." ".$this->getAutonomie();     
    }



}