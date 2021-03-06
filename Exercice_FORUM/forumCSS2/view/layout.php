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
    <script src="https://cdn.tiny.cloud/1/jtt4ldp5prwz5oh4r80swyigzmwuewsv87ysvoju3few86zf/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>tinymce.init({
        selector:'.tiny',
        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
                protect: [
                    /\<\/?(if|endif)\>/g,  // Protect <if> & </endif>
                    /\<xsl\:[^>]+\>/g,  // Protect <xsl:...>
                    /<\?php.*?\?>/g  // Protect php code
                ]
            });
        }
    });</script>

    <link rel="stylesheet" href="./public/css/style.css">
    <title><?= $titrePage ?></title>
</head>
<body>
    <!-- ------------------ NAV ------------------ -->
    <nav id="nav" class="uk-background-secondary" uk-sticky uk-navbar>
        <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
                <li><a href="?ctrl=home&method=index"><span uk-icon='home'></span>&nbsp;Accueil</a></li>
                <li><a href="?ctrl=forum&method=allTopics"><span uk-icon='star'></span>&nbsp;Topics</a></li>
                <?php
                
                    if(App\Session::getUser() === null){ ?>
                        <li><a href="?ctrl=forum&method=showProfil"><span uk-icon='user'></span>&nbsp;Profil</a></li>    
                    <?php } else { ?>
                        <li><a href="?ctrl=forum&method=showProfil"><span uk-icon='user'></span>&nbsp;<?= App\Session::getUser()->getPseudo() ?></a></li>
                        
                    <?php } ?> 
                
                <?php 
                    if(App\Session::getUser() === null){ ?>
                        <li><a href="?ctrl=security&method=connect"><span uk-icon='sign-in'></span>&nbsp;Connexion</a></li>
                    <?php } else { ?>
                        <li><a href="?ctrl=security&method=disconnect"><span uk-icon='sign-in'></span>&nbsp;Déconnexion</a></li>
                    <?php } ?>

                    <?php 
                    if(App\Session::getUser() === null){ ?>
                        <li><a href="?ctrl=security&method=inscription"><span uk-icon='sign-in'></span>&nbsp;Inscription</a></li>
                    <?php } ?>
                 
                
               
            </ul>
        </div>
    </nav>

    <!-- ------------------ MAIN ------------------ -->
    <div id="wrapper" class="uk-container uk-container-expand">
        <div id="mainPage">
            <main>
                <h1>FORUM</h1><hr>
                
                <?php
                    if(App\Session::hasMess())  {
                        foreach(App\Session::getMess("success") as $msg){
                            echo $msg."<br>";
                        }
                        foreach(App\Session::getMess("error") as $msg){
                            echo $msg."<br>";
                        }
                    }

                ?>
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