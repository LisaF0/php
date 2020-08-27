<h2>Nouveau Sujet</h2>

<form>
    <div class="uk-margin" action="?ctrl=forum&method=addTopic" method="POST">
        <input class="uk-input" type="text" name="title" id="title" placeholder="Titre">
    </div>

    <div class="uk-margin">
            <textarea class="uk-textarea" rows="5" placeholder="Message" name="msg" id="msg"></textarea>
    </div>
    <button class="uk-button uk-button-default">Créer un nouveau sujet</button>
</form>

<?php
//  var_dump($data["topic"]);

