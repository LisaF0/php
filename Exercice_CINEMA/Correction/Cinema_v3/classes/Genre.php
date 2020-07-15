<?php

/**
 * Class Genre
 */
class Genre {

    // Attributs
    private $nomGenre;
    private $films; // Film[]

    // Constructeur
    /**
     * @param [string] $nomGenre
     */
    public function __construct(string $nomGenre = "N/A"){
        $this->nomGenre = $nomGenre;
        $this->films = [];
    }

    // Getters et setters    
    /**
     * getNomGenre
     *
     * @return void
     */
    public function getNomGenre(){
        return $this->nomGenre;
    }
    
    /**
     * ajouterFilm
     *
     * @param  Film $f
     * @return void
     */
    public function ajouterFilm(Film $f){
        $this->films[] = $f;
    }
    
    /**
     * listerFilms
     *
     * @return void
     */
    public function listerFilms(){
        echo "<h3>Liste des films dans le genre <strong>".$this->getNomGenre()."</strong> (".count($this->films).")</h3>";
        echo "<ul>";
            foreach($this->films as $film){
                echo "<li>$film</li>";
            }
        echo "</ul>";
    }
}