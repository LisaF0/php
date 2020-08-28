<h2>Sign In</h2>


<form action="?ctrl=security&method=login" method="POST">

    <div class="uk-margin">
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input class="uk-input" id="mail" name="mail" type="text" placeholder="Email">
        </div>
    </div>

    <div class="uk-margin">
        <div class="uk-inline">
            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
            <input class="uk-input" name="password" id="password" type="text" placeholder="Password">
        </div>
    </div>

    <button class="uk-button uk-button-default">SIGN IN</button>
    <p><a href="?ctrl=home&method=inscription">Not a member yet?</a></p>


</form>