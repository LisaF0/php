<h2>LISTE DES SUJETS</h2>
<a class="uk-button uk-button-primary" href="?ctrl=forum&method=formAddTopic">Nouveau Sujet</a>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Date de création</th>
            <th>Nb message</th>
            <th>Vérouillé</th>
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
            <td>
                <a href="?ctrl=forum&method=deleteTopic" class="uk-button uk-button-danger">DELETE</a>
            </td>
    </tr>

<?php } 
?>

    </tbody>
<table>
