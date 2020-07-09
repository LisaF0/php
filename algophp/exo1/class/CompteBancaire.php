<?php

class CompteBancaire{
    private $libelle;
    private $soldeInitial;
    private $devise;
    private $titulaire;


    public function __construct($libelle, $soldeInitial, $devise, $titulaire){
        $this->libelle = $libelle;
        $this->soldeInitial = $soldeInitial;
        $this->devise = $devise;
        $this->titulaire = $titulaire;
        $titulaire->addComptesBancaire($this);
    }

    
    public function getLibelle()
    {
        return $this->libelle;
    }
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

   
    public function getSoldeInitial()
    {
        return $this->soldeInitial;
    } 
    public function setSoldeInitial($soldeInitial)
    {
        $this->soldeInitial = $soldeInitial;

        return $this;
    }


    public function getDevise()
    {
        return $this->devise;
    }
    public function setDevise($devise)
    {
        $this->devise = $devise;

        return $this;
    }


    public function getTitulaire()
    {
        return $this->titulaire;
    }
    public function setTitulaire($titulaire)
    {
        $this->titulaire = $titulaire;

        return $this;
    }

   
    public function crediter($somme){

        $this->soldeInitial += $somme;
    }
    public function debiter($somme){

        $this->soldeInitial -= $somme;
    }

    public function virement($somme, $compteCible){
        $this->debiter($somme);
        $compteCible->crediter($somme);
    }



    

    public function __toString(){
        return "Libellé : ".$this->getLibelle().
        "<br> solde : ".$this->getSoldeInitial().
        " ".$this->getDevise().
        "<br> titulaire : ".$this->getTitulaire();
    }




}


