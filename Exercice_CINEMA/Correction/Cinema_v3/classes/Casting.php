<?php

/**
 * Class Casting
 */
class Casting {

    // Attributs
    private $acteur; // Objet Acteur
    private $role; // Objet Rôle
    private $film; // Objet Film

    // Constructeur
    /**
     * @param Acteur $acteur
     * @param Role $role
     * @param Film $film
     */
    public function __construct(Acteur $acteur = null, Role $role = null, Film $film = null){
        $this->acteur = $acteur;
        $this->role = $role;
        $this->film = $film;
        $acteur->ajouterCasting($this);
        $film->ajouterCasting($this);
        $role->ajouterCasting($this);
    }

    // Getters et setters    
    /**
     * getActeur
     *
     * @return void
     */
    public function getActeur(){
        return $this->acteur;
    }
    
    /**
     * getRole
     *
     * @return void
     */
    public function getRole(){
        return $this->role;
    }
    
    /**
     * getFilm
     *
     * @return void
     */
    public function getFilm(){
        return $this->film;
    }
}
