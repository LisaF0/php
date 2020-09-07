<h2>PROFIL</h2>

<form action="?ctrl=&method=" method="POST">
    <div class="uk-margin">
    <div class="uk-inline">
        <span class="uk-form-icon" uk-icon="icon: user"></span>
        <input class="uk-input" name="pseudo" id="pseudo" type="text" placeholder="Pseudo" value="<?= App\Session::getUser()->getPseudo() ?>" disabled>
    </div>
    </div>


    <div class="uk-margin">
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input class="uk-input" name="mail" id="mail" type="email" value="<?= App\Session::getUser()->getMail() ?>" placeholder=" Email" disabled>
        </div>
        <div class="uk-inline">
            <a href="?ctrl=security&method=formEditMail" class="uk-button uk-button-primary">EDIT</a>
        </div>
    </div>

    <div class="uk-margin">
        <div class="uk-inline">
            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
            <input class="uk-input" name="password" id="password" type="password" value="********" placeholder="Password" disabled>
        </div>
        <div class="uk-inline">
            <a href="?ctrl=security&method=formEditPassword" class="uk-button uk-button-primary">EDIT</a>
        </div>
    </div>
</form>

<h3>Liste de vos messages</h3>
<table class="uk-table uk-table-striped">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Date du topic</th>
            <th>Message</th>
            <th>Date du message</th>
        </tr>
    </thead>
    <tbody>
<?php 

foreach($data['posts'] as $post){ ?>
    <tr>
        <td><a href="?ctrl=forum&method=show&id=<?= $post->getTopic()->getId() ?>"><?= $post->getTopic()->getTitle() ?></a></td>
        <td><?= $post->getTopic()->getUser()->getPseudo() ?></td>
        <td><?= $post->getTopic()->getCreationdate() ?></td>
        <td><?= $post->getMsg() ?></td>
        <td><?= $post->getCreationdate() ?></td>
    </tr>
<?php }
?>

    </tbody>
<table>
        