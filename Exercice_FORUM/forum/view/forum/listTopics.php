<h2>LISTE DES SUJETS</h2>

<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Date de création</th>
            <th>Vérouillé</th>
            <th>Résolu</th>

        </tr>
    </thead>
    <tbody>

<?php
var_dump($data['topics']);



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
            <td>
                <?= $topic->getClosed() == '1' ? "vérouillé" : "" ?>
            </td>
            <td>
                <?= $topic->getResolved() == '0' ? "résolu" : "" ?>
            </td>
    </tr>

<?php }