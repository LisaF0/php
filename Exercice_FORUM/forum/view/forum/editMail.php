<h2>EDIT MAIL</h2>

<form action="?ctrl=security&method=editMail" method="POST">
    
    <div class="uk-margin">
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input class="uk-input" name="oldMail" id="oldMail" type="email" placeholder=" Ancien Email" required>
        </div>
    </div>
    <div class="uk-margin">
    
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input class="uk-input" name="newMail" id="newMail" type="email" placeholder=" Nouveau Email" required>
        </div>
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input class="uk-input"  name="verifMail" id="verifMail" type="email" placeholder="Vérification Email" required>
        </div>
    </div>

    <input type="submit" class="uk-button uk-button-default" value="Modifier">

</form>