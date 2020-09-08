<h2>EDIT PASSWORD</h2>


<form action="?ctrl=security&method=editPassword" method="POST">
    
    <div class="uk-margin">
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input class="uk-input" name="oldPassword" id="oldPassword" type="password" placeholder=" Ancien password" required>
        </div>
    </div>
    <div class="uk-margin">
    
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input class="uk-input" name="newPassword" id="newPassword" type="password" placeholder=" Nouveau Password" required>
        </div>
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input class="uk-input"  name="verifPassword" id="verifPassword" type="password" placeholder="Vérification Password" required>
        </div>
    </div>

    <input type="submit" class="uk-button uk-button-default" value="Modifier">

</form>