<h2>REGISTER</h2>


<form action="?ctrl=security&method=register" method="POST">
    <div class="uk-margin">
    <div class="uk-inline">
        <span class="uk-form-icon" uk-icon="icon: user"></span>
        <input class="uk-input" name="pseudo" id="pseudo" type="text" placeholder="Pseudo" required>
    </div>
    </div>


    <div class="uk-margin">
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input class="uk-input" name="mail" id="mail" type="text" placeholder=" Email" required>
        </div>
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input class="uk-input"  name="verifMail" id="verifMail" type="text" placeholder="Vérification Email" required>
        </div>
    </div>

    <div class="uk-margin">
        <div class="uk-inline">
            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
            <input class="uk-input" name="password" id="password" type="text" placeholder="Password" required>
        </div>
        <div class="uk-inline">
            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
            <input class="uk-input" name="password_r" id="password_r" type="text" placeholder="Vérification Password" required>
        </div>
    </div>

    <input type="submit" class="uk-button uk-button-default" value="REGISTER">
    


</form>