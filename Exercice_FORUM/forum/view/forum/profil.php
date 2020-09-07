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

<!-- <table class="uk-table uk-table-striped">
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

    </tbody>
<table> -->
        