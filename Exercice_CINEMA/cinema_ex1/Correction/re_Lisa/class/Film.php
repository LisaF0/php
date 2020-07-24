<?php

class Film{
    private $titre;
    private $anneSortie;
    private $dureeMin;
    private $synopsis;
    private $realisateur;
    private $genre;
    private $castings;

    public function __construct(string $titre = "N/A", string $anneSortie = "now", int $duree = 0, string $synopsis = "N/A", Realisateur $realisateur = null, Genre $genre = null)
    {
        $this->titre = $titre;
        $this->anneSortie = $anneSortie;
        $this->duree = $duree;
        $this->synopsis = $synopsis;
        $this->realisateur = $realisateur;
        $realisateur->addFilms($this);
        $this->genre = $genre;
        $genre->addFilms($this);
        $this->castings = [];
    }


        /**
         * Get the value of titre
         */ 
        public function getTitre()
        {
                return $this->titre;
        }

        /**
         * Set the value of titre
         *
         * @return  self
         */ 
        public function setTitre($titre)
        {
                $this->titre = $titre;

                return $this;
        }

        /**
         * Get the value of anneSortie
         */ 
        public function getAnneSortie()
        {
                return $this->anneSortie;
        }

        /**
         * Set the value of anneSortie
         *
         * @return  self
         */ 
        public function setAnneSortie($anneSortie)
        {
                $this->anneSortie = $anneSortie;

                return $this;
        }

        /**
         * Get the value of duree
         */ 
        public function getDuree()
        {
                return $this->duree;
        }

        /**
         * Set the value of duree
         *
         * @return  self
         */ 
        public function setDuree($duree)
        {
                $this->duree = $duree;

                return $this;
        }

        /**
         * Get the value of synopsis
         */ 
        public function getSynopsis()
        {
                return $this->synopsis;
        }

        /**
         * Set the value of synopsis
         *
         * @return  self
         */ 
        public function setSynopsis($synopsis)
        {
                $this->synopsis = $synopsis;

                return $this;
        }

        /**
         * Get the value of realisateur
         */ 
        public function getRealisateur()
        {
                return $this->realisateur;
        }

        /**
         * Set the value of realisateur
         *
         * @return  self
         */ 
        public function setRealisateur($realisateur)
        {
                $this->realisateur = $realisateur;

                return $this;
        }

        public function addCastings(Casting $casting){
            $this->castings[] = $casting;
        }

        public function getCastings(){
            $totalActeurs = "";
            foreach($this->castings as $casting){
                $totalActeurs .="<ul><li>".$casting->getActeur()."</li></ul>";
            }
            return $this." <br>Acteurs :".$totalActeurs;
        }

    public function __toString()
    {
        return $this->getTitre()." (".$this->getDuree().", ".$this->getAnneSortie()." )";
    }
}
