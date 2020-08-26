<h2>Nouveau Sujet</h2>

<form>
    <div class="uk-margin" action="?ctrl=forum&method=addTopic" method="POST">
        <input class="uk-input" type="text" placeholder="Titre">
    </div>

    <div class="uk-margin">
            <textarea class="uk-textarea" rows="5" placeholder="Message"></textarea>
    </div>
    <button class="uk-button uk-button-default"><a href="?ctrl=forum&method=allTopics">Créer un nouveau sujet</a></button>
</form>