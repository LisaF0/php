<?php

class Film{
    private $titre;
    private $dateSortie;
    private $duree;
    private $synopsis;
    private $genre;
    private $realisateur;

    public function __construct($titre, $dateSortie, $duree, $synopsis, $genre, $realisateur){
        $this->titre = $titre;
        $this->dateSortie = new DateTime($dateSortie);
        $this->duree = $duree;
        $this->synopsis = $synopsis;
        $this->genre = $genre;
        $this->realisateur = $realisateur;
    }
 
    public function getTitre()
    {
        return $this->titre;
    }
    public function getDateSortie()
    {
        return $this->dateSortie->format("d/m/Y");
    }
    public function getDuree()
    {
        return $this->duree; //strftime( "%H:%M", $this->duree * 60 );
    }
    public function getSynopsis()
    {
        return $this->synopsis;
    }
    public function getGenre()
    {
        return $this->genre;
    }
    public function getRealisateur(){
        return $this->realisateur;
    }


    public function getDureeHours(){
        return date("H:i", mktime(0,$this->duree));
    }




    public function __toString(){
        return "Le film ".$this->titre.
        " sorti le ".$this->getDateSortie().
        " dure ".$this->getDureeHours().
        " ".$this->synopsis.
        " et appartient au genre : ".$this->genre.
        " (".$this->realisateur.")<br>";
    }
}