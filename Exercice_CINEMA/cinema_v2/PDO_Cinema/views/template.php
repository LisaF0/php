<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"></script>
    <title><?= $titre ?></title>
</head>
<body>
<nav class="uk-navbar-container" uk-navbar>
        <ul class="uk-navbar-nav">
            <li><a href="index.php?action=listFilms">Liste des films</a></li>        
            <li><a href="index.php?action=listReal">Liste des réalisateurs</a></li>
            <li><a href="index.php?action=listGenre">Liste des genres</a></li>
        </ul>
    </nav>
    <div class="uk-container uk-container-expand">
        <h1>Gestion films avec PDO</h1>
        <?= $contenu ?>
    </div>
</body>
</html>