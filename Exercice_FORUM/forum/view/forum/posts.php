<h2><?= $data['topic']->getTitle(); ?></h2>

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
                <a href="?ctrl=forum&method=deletePost&id=<?= $post->getId() ?>" class="uk-button uk-button-danger">DELETE MESSAGE</a>
            </li>
<?php } ?>
        </ul>
    </li>
</ul>


<form action="?ctrl=forum&method=addPost&id=<?= $data['topic']->getId() ?>" method="POST">
    <div class="uk-margin">
            <textarea class="uk-textarea" rows="5" name="msg" id="msg" placeholder="Répondre" required></textarea>
    </div>
    <input type="submit" class="uk-button uk-button-default" value="Envoyer">
</form>