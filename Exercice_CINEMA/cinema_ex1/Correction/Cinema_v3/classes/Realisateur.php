<?php

/**
 * Class Realisateur
 */
class Realisateur extends Personne {

    //Attributs
    private $films; // Filmographie d'un réalisateur (Film[])

    //Constructeur
    /**
     * @param [string] $nom
     * @param [string] $prenom
     * @param [string] $sexe
     * @param [string] $dateNaissance
     */
    public function __construct(string $nom = "N/A", string $prenom = "N/A", string $sexe = "N/A", string $dateNaissance = "now"){
        // héritage du constructeur de Personne
        parent::__construct($nom, $prenom, $sexe, $dateNaissance);
        $this->films = [];
    }

    // Getters et setters    
    /**
     * getFilms
     *
     * @return void
     */
    public function getFilms(){
        return $this->films;
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
     * afficherFilmographie
     *
     * @return void
     */
    public function afficherFilmographie(){
        echo "<h3>Filmographie de <strong>".$this."</strong> (".$this->getAge()." ans)</h3>";
        $compteFilms = (count($this->getFilms()) == 0) ? "Aucun film pour ce réalisateur" : count($this->getFilms());
        
        echo "Nombre de films <span class='uk-badge badge-color'>".$compteFilms."</span>";
        echo "<ul class='uk-list uk-list-striped'>";
            foreach($this->getFilms() as $film){
                echo "<li>$film</li>";
            }
        echo "</ul>";
    }
}