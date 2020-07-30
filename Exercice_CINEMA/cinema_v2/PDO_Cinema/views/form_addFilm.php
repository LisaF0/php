<?php
    ob_start();

?>


<h2>Ajouter un nouveau film</h2>

<form action="addFilm.php" method="post">
        <p>
            <label for="titre">Titre:</label>
            <input type="text" name="titre" required>
        </p>
        <p>
            <label for="annee_sortie">Année de sortie:</label>
            <input type="int" name="annee_sortie" required>
        </p>
        <p>
            <label for="duree">Durée(min):</label>
            <input type="int" name="duree" required>
        </p>
        <p>
            <label for="synopsis">Synopsis:</label>
            <input type="text" name="synopsis">
        </p>
        <p>
            <label for="note">Note:</label>
            <input type="int" name="note">
        </p>
        <p>
            
            <label for="genre">Genre:</label>
            <select name="genre" id="genre" multiple>
                <?php while($genre = $genres->fetch(PDO::FETCH_ASSOC)) 
                { ?>
            <option value="<?php $genre['libelle']?>"><?= $genre['libelle']?></option>
                <?php } ?>
            </select>
        
        </p>
        <p>
            <label for="realisateur">Réalisateur:</label>
            <select name="realisateur" id="realisateur"><?php
                while($realisateur = $realisateurs->fetch(PDO::FETCH_ASSOC))
                {?>
                    <option value="<?php $realisateur['nom_realisateur']." ".$realisateur['prenom_realisateur'] ?>"><?= $realisateur['nom_realisateur']." ".$realisateur['prenom_realisateur'] ?></option>
                <?php } ?>
            </select>
        </p>
        
        <p>
            <input type='submit' value="Soumettre">
        </p>
    </form>

<?php


$titre = "Ajout film";
$contenu = ob_get_clean();
require "template.php";