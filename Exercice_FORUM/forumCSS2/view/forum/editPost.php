<form action="?ctrl=forum&method=editPost&id=<?= $data['post']->getId() ?>" method="POST">
    <div class="uk-margin">
        <textarea class="uk-textarea" rows="5" name="msg" id="msg" placeholder="Répondre" required><?= $data["post"]->getMsg() ?></textarea>
    </div>
    <input type="submit" class="uk-button uk-button-default" value="Envoyer">
</form>  