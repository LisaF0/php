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
            if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
        ?>
    </p>
    <p>Ajouter un nouveau film:</p>
    <form action="addFilm.php" method="post">
        <p>
            <label for="titre">Titre</label>
            <input type="text" name="titre" required>
        </p>
        <p>
            <label for="annee_sortie">Année de sortie</label>
            <input type="int" name="annee_sortie" required>
        </p>
        <p>
            <label for="duree">Durée</label>
            <input type="int" name="duree" required>
        </p>
        <p>
            <label for="synopsis">Synopsis</label>
            <input type="text" name="synopsis">
        </p>
        <p>
            <label for="note">Note</label>
            <input type="int" name="note">
        </p>
        <p>
            <label for="affiche">Affiche</label>
            <input type="text" name="affiche">
        </p>
        <p>
            <label for="genre">Genre</label>
            <input type="text" name="genre">
        </p>
        <!-- <p>
            <label for="realisateur">Réalisateur</label>
            <input type="text" name="realisateur">
        </p> -->
        <p>
            <input type='submit' value="Soumettre">
        </p>
    </form>
</body>
</html>