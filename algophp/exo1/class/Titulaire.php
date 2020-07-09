<?php

class Titulaire{
    private $nom;
    private $prenom;
    private $birthDay;
    private $ville;
    private $comptesBancaire;


    public function __construct($nom, $prenom, $birthDay, $ville){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->birthDay = $birthDay;
        $this->ville = $ville;
        $this->comptesBancaire = [];
    }

    public function getNom()
    {
        return $this->nom;
    } 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }


    public function getAge()
    {
       $today = new DateTime();
       $birthDay = new DateTime(($this->birthDay));
        $age = $birthDay->diff($today);
        return $age->format('%y ans');
    }
    public function setBirthDay($birthDay)
    {
        $this->birthDay = $birthDay;

        return $this;
    }


    public function getVille()
    {
        return $this->ville;
    }
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }


    public function getComptesBancaire()
    {
        return $this->comptesBancaire;
    }

    public function setComptesBancaire($comptesBancaire)
    {
        $this->comptesBancaire = $comptesBancaire;
        return $this;
    }



    public function addComptesBancaire($compte){
        array_push($this->comptesBancaire, $compte);
    }

    // public function displayComptes(){
    
    //     foreach($this->comptesBancaire as $compte){
    //         echo $compte->getLibelle();
    //     }
        
    }

    public function __toString(){
        $info = "Nom : ".$this->nom.
        "<br>Prénom : ".$this->prenom.
        "<br>Age : ".$this->getAge().
        "<br>Ville : ".$this->ville.
        "<br> Libellé : ";
        foreach($this->comptesBancaire as $compte){
            $info.= $compte->getLibelle().", ";
        }
        return $info;
        

        

    }




}