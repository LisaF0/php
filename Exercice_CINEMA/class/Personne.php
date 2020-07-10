<?php

class Personne{
    private $nom;
    private $prenom;
    private $birthDay;

    public function __construct(string $nom = "N/A", string $prenom = "N/A", 
                        string $birthDay = "N/A")
    {
       $this->nom = $nom;
       $this->prenom = $prenom;
       $this->birthDay = new DateTime($birthDay); 
    }
       /**
        * Get the value of nom
        */ 
       public function getNom()
       {
              return $this->nom;
       }

       /**
        * Set the value of nom
        *
        * @return  self
        */ 
       public function setNom($nom)
       {
              $this->nom = $nom;

              return $this;
       }

       /**
        * Get the value of prenom
        */ 
       public function getPrenom()
       {
              return $this->prenom;
       }

       /**
        * Set the value of prenom
        *
        * @return  self
        */ 
       public function setPrenom($prenom)
       {
              $this->prenom = $prenom;

              return $this;
       }

       /**
        * Get the value of birthDay
        */ 
       public function getBirthDay()
       {
              return $this->birthDay;
       }

       /**
        * Set the value of birthDay
        *
        * @return  self
        */ 
       public function setBirthDay($birthDay)
       {
              $this->birthDay = $birthDay;

              return $this;
       }

       public function getAge() {
              $now = new DateTime();
              $age = $this->getBirthDay()->diff($now);
              return $age->format('%Y');
          }

          public function __toString()
          {
              return $this->prenom." ".$this->nom." (".$this->getAge()." ans)"; 
          }
}