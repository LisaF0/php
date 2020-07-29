<?php
/**
 * fonction qui crée un objet PDO
 */
// PDO = PHP Data Object a pour but d'interpreter les requetes et de les traduires pour tout les SGBD

function connect() :PDO //  
{
    try{
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];
        $pdo = new PDO('mysql:host=localhost:3306;dbname=user','root','',$options);
        return $pdo;
    }
    catch(PDOException $e){
        echo $e->getMessage();
        die();
    }
}