<?php
require "DAO.php";

class formControllers{
    public function getForm(){
        if(!empty($_POST)){
            $titre = "titre";
            $annee_sortie = filter_input(INPUT_POST, 'annee_sortie', FILTER_SANITIZE_NUMBER_INT);
            $duree = filter_input(INPUT_POST, 'duree', FILTER_SANITIZE_NUMBER_INT);
            $note = "note";
            $synopsis = "synopsis";
            $genre = "libelle";
            $realisateur = "realisateur";
            
        
            if($titre && $annee_sortie && $duree && $genre && $note && $realisateur){
                $dao = new DAO;
                $sql = 'INSERT INTO film (titre, annee_sortie, duree, synopsis) '.
                "VALUES (:titre, :annee_sortie, :duree)". 
                "INSERT INTO genre (libelle)".
                "VALUES (:libelle)"
                    
                    $stmt->execute([
                        "titre" => $titre,
                        "annee_sortie" => $annee_sortie,
                        "duree" => $duree,
                        "synopsis" => $synopsis,
                        "libelle" => $genre,
                        
                    ]);
                    header("Location: index.php");
                    echo "<p>Vous avez ajouté un nouveau film</p>";
                    die();
        
                }
                catch(Exception $e){
                    echo $e->getMessage();
                }
            }
        
        }
    }
}