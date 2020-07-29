<?php

session_start();

require "DAO.php";

if(!empty($_POST)){// si les champs du formulaire ne sont pas vides
    $username = filter_input(INPUT_POST, 'username', FILTER_VALIDATE_REGEXP, [
        "options" => ["regexp" => "/^[a-zA-Z0-9]{4,32}/"]
    ]);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $password_r = filter_input(INPUT_POST, 'password_r', FILTER_SANITIZE_STRING);
    $cgu = filter_input(INPUT_POST, 'cgu', FILTER_SANITIZE_STRING);

    if($username && $email && $password && $cgu){
        if($password = $password_r){
            $pdo = connect();
            try{
                $stmt = $pdo->prepare( //on prepare la requête
                    "INSERT TO user (username, password, email) ".
                    "VALUES (:username, :password, :email)"
                );

                $stmt->execute([ // on execute la requete, les info sont recup dans la bdd
                    "username" => strtolower($username),
                    "password" => password_hash($password, PASSWORD_ARGON2I),
                    "email" => $email,
                ]);
                $_SESSION['success'] = "Inscription réussie, connectez-vous !";
                header("Location:index.php");
                die();
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }
        else $_SESSION['error'] = "Les mots de passe de correspondent pas !";
    }
    else $_SESSION['error'] = "Vous devez remplir TOUS les champs obligatoires !";
}
else $_SESSION['error'] = "Vous n'avez pas soumis le formulaire";

header("Location:form_register.php");// renvoie vers un lien/page 
die();