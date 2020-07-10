<?php

class Voiture{
    private $marque;
    private $modele;
    private $nbPortes;
    private $vitesseActuelle = 0;
    private $marche = false;

    public function __construct($marque, $modele, $nbPortes){
        $this->marque = $marque;
        $this->modele = $modele;
        $this->nbPortes = $nbPortes;
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

 
    public function getNbPortes()
    {
        return $this->nbPortes;
    }
    public function setNbPortes($nbPortes)
    {
        $this->nbPortes = $nbPortes;
        return $this;
    }


    public function getVitesseActuelle()
    {
        return "La vitesse du véhicule ".$this->marque." ".$this->modele." est de : ".$this->vitesseActuelle." km/h<br>";
    }
    public function setVitesseActuelle($vitesseActuelle)
    {
        $this->vitesseActuelle = $vitesseActuelle;
        return $this;
    }

    public function demarrer(){ 
        $this->marche = true;
        return $this->marque." ".$this->modele." est démarré<br>";
    }
    public function stopper(){
        $this->marche = false;
        return $this->marque." ".$this->modele." est à l'arrêt<br>";
    }



    public function accelerer($acceleration){
        if($this->marche === true){
            $this->vitesseActuelle += $acceleration;
            return "La voiture accélère de ".$acceleration." km/h<br>";
        } else {
            return "Le véhicule ".$this->marque." ".$this->modele." veut accélèrer de ".$acceleration." km/h.<br>
            Pour accélèrer, il faut démarrer le véhicule ".$this->marque." ".$this->modele."<br>";
        }
    }
    public function ralentir($ralenti){
        if($this->marche === true){
             $this->vitesseActuelle -= $ralenti;
             return "La voiture ralenti de ".$ralenti." km/h<br>";
        } else {
            return "Pour ralentir la voiture doit rouler<br>";
        }
    }

    public function __toString(){
        return "<br>Nom et modèle du véhicule : ".$this->marque." ".$this->modele
                ."<br>Nombre de portes : ".$this->nbPortes
                ."<br>Le véhicule ".$this->demarrer()
                ."Sa vitesse actuelle est de : ".$this->vitesseActuelle." km/h<br>";    
    }

}

