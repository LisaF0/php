<h2>LISTE DES SUJETS</h2>
<div id="head">
    <div class="uk-margin">
        <form class="uk-search uk-search-default">
            <span uk-search-icon></span>
            <input class="uk-search-input" type="search" placeholder="Search...">
        </form>
    </div>
    <ul class="uk-pagination uk-flex-center" uk-margin>
        <li><a href="#"><span uk-pagination-previous></span></a></li>
        <li><a href="#">1</a></li>
        <li class="uk-disabled"><span>...</span></li>
        <li><a href="#">5</a></li>
        <li><a href="#">6</a></li>
        <li class="uk-active"><span>7</span></li>
        <li><a href="#">8</a></li>
        <li><a href="#"><span uk-pagination-next></span></a></li>
    </ul>

    <?php
        if(!App\Session::getUser() == null){?>
        <a class="uk-button uk-button-primary" id="right" href="?ctrl=forum&method=formAddTopic">Nouveau Sujet</a>
    <?php
        }
    ?>
</div>
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Date de création</th>
            <th>Nb message</th>
            <th>Vérrouiller</th>
            <th>Résolu</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        
<?php
foreach($data['topics'] as $topic){?> 
    <tr>
            <td>
                <a href="?ctrl=forum&method=show&id=<?= $topic->getId() ?>"><?= $topic->getTitle(); ?></a>
            </td>
            <td>
                <?= $topic->getUser(); ?>
            </td>
            <td>
                <?= $topic->getCreationdate();?>
            </td>
            <td> <span uk-icon="comment"><?= $topic->getNBmsg(); ?></span></td>
            <td>
                <?= $topic->getClosed() == '1' ? '<span uk-icon="icon: lock"></span>' : '<span uk-icon="icon: unlock"></span>' ?>
            </td>
            <td>
                <?= $topic->getResolved() == '1' ? '<span uk-icon="icon: check"></span>' : "" ?>
            </td>
            <?php 
                // if role == admin alors afficher le bouton sinon rien
            ?>
            <td>
                <a href="?ctrl=forum&method=deleteTopic&id=<?= $topic->getId() ?>" class="uk-button uk-button-danger">DELETE</a>
            </td>
    </tr>

<?php } 
?>

    </tbody>
<table>
