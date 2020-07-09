<?php

$merlin = new Personnage("Merlin");
$harry = new Personnage("Harry");

var_dump($merlin);



class Personnage{
    public $nom;
    public $vie = 80;
    public $atk = 20;

    public function __construct($nom){
        $this->nom = $nom;
    }
    public function mort(){
        return $this->vie <= 0;
    }
    public function regenerer($vie = null){
        if(is_null($vie)){
            $this->vie = 100;
        } else {
            $this->vie += $vie;
        }
    }
   
}

$harry->mort();
$harry->regenerer(5);
var_dump($harry);