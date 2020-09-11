<h2><?= $data['topic']->getTitle(); ?></h2>
<?php
if(App\Session::getUser() && App\Session::hasRole("role_admin") || App\Session::getUser() && App\Session::getUser()->getId() == $data['topic']->getUser()->getId()){ ?>
    <?php 
    if($data['topic']->getClosed() == 0){ ?>
        <a href="?ctrl=forum&method=closed&id=<?= $data['topic']->getId() ?>" class="uk-button uk-button-primary">Dévérouiller</a>
    <?php
    } else { ?>
        <a href="?ctrl=forum&method=closed&id=<?= $data['topic']->getId() ?>" class="uk-button uk-button-primary">Vérouiller</a>
    <?php
    }
    ?>

    <?php 

    if($data['topic']->getResolved() == 0){ ?>
        <a href="?ctrl=forum&method=resolved&id=<?= $data['topic']->getId() ?>" class="uk-button uk-button-primary">Non Résolu</a>
    <?php
    } else { ?>
        <a href="?ctrl=forum&method=resolved&id=<?= $data['topic']->getId() ?>" class="uk-button uk-button-primary">Résolu</a>
    <?php
    }
}
?>



<ul class="uk-comment-list">
    <li>
        <article class="uk-comment uk-visible-toggle" tabindex="-1">
            <header class="uk-comment-header uk-position-relative">
                <div class="uk-grid-medium uk-flex-middle" uk-grid>
                    <div class="uk-width-auto">
                        <img class="uk-comment-avatar" src="" width="80" height="80" alt="">
                    </div>
                    <div class="uk-width-expand">
                        <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#"><?= $data['topic']->getUser(); ?></a></h4>
                        <p class="uk-comment-meta uk-margin-remove-top"><a class="uk-link-reset" href="#"><?= $data['topic']->getCreationdate(); ?></a></p>
                    </div>
                </div>
                <div class="uk-position-top-right uk-position-small uk-hidden-hover"><a class="uk-link-muted" href="#">Reply</a></div>
            </header>
            <!-- <div class="uk-comment-body">
                <p></p>
            </div> -->
        </article>
        <ul>

<?php
foreach($data['posts'] as $post){?>
            <li>
                <article class="uk-comment uk-comment-primary"> 
                    <header class="uk-comment-header">
                            <div class="uk-grid-medium uk-flex-middle" uk-grid>
                                <div class="uk-width-auto">
                                     <img class="uk-comment-avatar" src="" width="80" height="80" alt="">
                                </div>
                                <div class="uk-width-expand">
                                    <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#"><?= $post->getUser()->getPseudo();?></a></h4>
                                    <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                                        <li><?= $post->getCreationdate();?></li>
                                    </ul>
                                </div>
                            </div>
                    </header>

                    <div class="uk-comment-body">
                        <p><?= $post->getMsg(); ?></p>
                    </div>
                </article>
                <?php 
                // un user peu éditer et delete un de ses post
                    if(!App\Session::getUser() == null){
                        if(App\Session::getUser()->getId() == $post->getUser()->getId()){
                        ?>
                            <a href="?ctrl=forum&method=formEditPost&id=<?= $post->getId() ?>" class="uk-button uk-button-primary">EDIT MESSAGE</a>
                            <a href="?ctrl=forum&method=deletePost&id=<?= $post->getId() ?>" class="uk-button uk-button-danger">DELETE MESSAGE</a>
                        <?php
                        }
                    }   ?>

            </li>
<?php } ?>
        </ul>
    </li>
</ul>

<?php
// Si Session is null alors on affiche pas le form, obliger de se connecter pour poster un msg
    if(App\Session::getUser() == null){
        App\Session::addMess('error', '<h2> Veuillez vous connecter pour poster un message </h2>');
    } else { ?>
        <form action="?ctrl=forum&method=addPost&id=<?= $data['topic']->getId() ?>" method="POST">
            <div class="uk-margin">
                    <textarea name="msg" class="uk-textarea tiny" rows="5"  placeholder="Répondre" required></textarea>
            </div>
            <input type="submit" class="uk-button uk-button-default" value="Envoyer">
        </form>
        <!-- <form action="" method="POST">
            <textarea id="mytextarea" name="msg" placeholder="Répondre" required></textarea>
            <input type="submit" class="uk-button uk-button-default" value="Envoyer">
        </form> -->
<?php 
    }
?>



