<h2>Nouveau Sujet</h2>

<form action="?ctrl=forum&method=addTopic" method="POST">
    <div class="uk-margin">
        <input class="uk-input" type="text" name="title" id="title" placeholder="Titre" required>
    </div>

    <div class="uk-margin">
            <textarea class="uk-textarea tiny" rows="5" placeholder="Message" name="msg" id="msg" required></textarea>
    </div>
    <input type="submit" class="uk-button uk-button-default" value="Créer un nouveau sujet">
</form>

<?php



