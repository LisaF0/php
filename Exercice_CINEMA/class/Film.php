<?php

class Film{
    private $titre;
    private $anneeSortieFR;
    private $duree;
    private $synopsis;
    private $realisateur;
    private $genre;

    public function __construct(string $titre = "N/A", string $anneeSortieFR = "N/A",
                        int $duree = 0, string $synopsis = "N/A", Realisateur $realisateur,
                         Genre $genre)
    {
        $this->titre = $titre;
        $this->anneeSortieFR = $anneeSortieFR;
        $this->duree = $duree;
        $this->synopsis = $synopsis;
        $this->realisateur = $realisateur;
        $realisateur->addFilms($this);
        $this->genre = $genre;
        $genre->addGenre($this);
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
         * Get the value of anneeSortieFR
         */ 
        public function getAnneeSortieFR()
        {
                return $this->anneeSortieFR;
        }

        /**
         * Set the value of anneeSortieFR
         *
         * @return  self
         */ 
        public function setAnneeSortieFR($anneeSortieFR)
        {
                $this->anneeSortieFR = $anneeSortieFR;

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

        /**
         * Get the value of genre
         */ 
        public function getGenre()
        {
                return $this->genre;
        }

        /**
         * Set the value of genre
         *
         * @return  self
         */ 
        public function setGenre($genre)
        {
                $this->genre = $genre;

                return $this;
        }

        

        public function getInfos(){
                return "Film : ".$this->titre."<br><ul>
                <li>Année de sortie :  ".$this->anneeSortieFR."</li><br>
                <li>Durée : ".$this->duree."</li><br>
                <li>Synopsis : ".$this->synopsis."</li><br>
                <li>Réalisateur : ".$this->realisateur."</li><br>
                <li>Genre : ".$this->genre."</li></ul><br><br>"
                ;
        }
        
        public function __toString()
        {
                return $this->titre." (".$this->getAnneeSortieFR()." ".$this->duree." minutes )";
        } 
}