<?php

class Livre{
    private $titre;
    private $auteur;
    private $nbPage;
    private $prix;
    private $dateSortie;


    public function __construct($titre = "(N/A)", $auteur ="(N/A)", $nbPage = 0, $prix = 0, $dateSortie = ""){ // ="" ou = 0 --> Donner une valeur par défaut
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->nbPage = $nbPage;
        $this->prix = $prix;
        $this->dateSortie = new DateTime($dateSortie); // permet de spécifié que la dateSortie est bien une date, permet de faire des calcul par la suite
    }

    public function getTitre(){
        return $this->titre;
    }

    public function getAuteur(){
        return $this->auteur;
    }
    public function getNbPage(){
        return $this->nbPage;
    }
    public function getPrix(){
        return $this->prix;
    }
    public function getDateSortie(){
        return $this->dateSortie->format("d/m/Y");
    }

    public function __toString(){
        return "Le livre ".$this->titre.
        " écrit par ".$this->auteur.
        " possède ".$this->nbPage." pages 
        et coûte ".$this->prix." euros
        et est sortie le ".$this->getDateSortie()."<br>";
    }

}
