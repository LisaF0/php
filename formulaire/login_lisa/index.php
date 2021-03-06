<?php
    session_start(); // démarre une nouvelle session ou reprend une session existante
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p id="message">
        <?php
            if(isset($_SESSION['success'])){ // isset détermine si une variable est déclarée et est différente de NULL
                echo $_SESSION['success'];// $_SESSION  Un tableau associatif des valeurs stockées dans les sessions, et accessible au script courant
                unset($_SESSION['success']); //détruit une variable
            }
            
        ?>
    </p>
    <div>
        <?php
            require "DAO.php";
            $pdo = connect();

            $stmt = $pdo->query("SELECT * FROM user");
            
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "<table><thead><tr><th>Pseudo</th><th>E-mail</th><th>Date d'inscription</th></tr></thead>";
            foreach($users as $user){
                echo "<tr>";
                echo "<td>".$user['username']."</td>";
                echo "<td>".$user['email']."</td>";
                echo "<td>".$user['createAt']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </div>
    <?php
        if(isset($_SESSION['user'])){
            ?>
            <mark>Connecté en tant que <?= $_SESSION["user"]["username"] ?></mark>
            <a href="logout.php">Déconnexion</a>
            <?php
        }
        else{
            ?>
            <a href="form_register.php">S'inscrire</a>
            <a href="form_login.php">Se connecter</a>
            <?php
        }
    ?>
</body>
</html>