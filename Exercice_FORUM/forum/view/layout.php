<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.4.6/dist/css/uikit.min.css" />
    <!-- UIkit JS -->
    <script src="uikit/dist/js/uikit-icons.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.6/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.4.6/dist/js/uikit-icons.min.js"></script>
    
    <link rel="stylesheet" href="<?= CSS_PATH ?>style.css">
    <title><?= $titrePage ?></title>
</head>
<body>
    <!-- ------------------ NAV ------------------ -->
    <nav id="nav" class="uk-navbar-container uk-background-secondary" uk-navbar>
        <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
                <li><a href="?ctrl=home&method=index"><span uk-icon='home'></span>&nbsp;Accueil</a></li>
                <li><a href="?ctrl=home&method=index"><span uk-icon='user'></span>&nbsp;Profil</a></li>
                <li><a href="?ctrl=security&method=connect"><span uk-icon='sign-in'></span>&nbsp;Connexion</a></li>
            </ul>
        </div>
    </nav>

    <!-- ------------------ MAIN ------------------ -->
    <div id="wrapper" class="uk-container uk-container-expand">
        <div id="mainPage">
            <main>
                <h1>FORUM</h1><hr>
                <div id="page">
                    <?= $page ?>
                </div>
            </main>
        </div>
        <footer>
            <p>
                &copy;2020 - COPYRIGHT - <a href="?ctrl=home&method=rules">Règlement du forum</a> - <a href="?ctrl=home&method=mentions">Mentions légales</a>
            </p>
        </footer>

    </div>
</body>
</html>