<?php

$title = 'Accueil - Le Chouette Coin';
require 'includes/header.php';
require 'includes/functions.php';

if (!empty($_POST['email_signup']) && !empty($_POST['password1_signup']) && !empty($_POST['username_signup'])
    && isset($_POST['submit_signup'])) {
    $email = htmlspecialchars($_POST['email_signup']);
    $password1 = htmlspecialchars($_POST['password1_signup']);
    $password2 = htmlspecialchars($_POST['password2_signup']);
    $username = htmlspecialchars($_POST['username_signup']);

    inscription($email, $username, $password1, $password2, $conn);
}
?>

<div class="row">
    <div class="col-6">
        <form
            action="<?php $_SERVER['REQUEST_URI']; ?>"
            method="POST">
            <div class="form-group">
                <label for="InputEmail1"> Addresse mail</label>
                <input type="email" class="form-control" aria-describedby="emailHelp" id="InputEmail1"
                    name="email_signup" required>
                <small id="emailHelp" class="form-text text-muted">Nous ne partageons jamais votre email avec qui que ce
                    soit.</small>
            </div>
            <div class="form-group">
                <label for="InputUsername1">Nom d'utilisateur</label>
                <input type="text" class="form-control" aria-describedby="userlHelp" id="InputUsername1"
                    name="username_signup" required>
                <small id="userlHelp" class="form-text text-muted">Choisissez un nom d'utilisateur, il doit être unique
                    !</small>
            </div>
            <div class="form-group">
                <label for="InputPassword1">Choisissez un mot de passe</label>
                <input type="password" class="form-control" id="InputPassword1" name="password1_signup" required>
            </div>
            <div class="form-group">
                <label for="InputPassword2">Entrez de nouveau le mot de passe</label>
                <input type="password" class="form-control" id="InputPassword2" name="password2_signup" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="Check1">
                <label class="form-check-label" for="Check1">Accepter les <a href="#">termes et conditons</a></label>
            </div>
            <button type="submit" class="btn btn-primary" name="submit_signup" value="inscription">S'inscrire</button>
        </form>
    </div>
    <div class="col-6">
        <form>
            <div class="form-group">
                <label">Adresse mail</label>
                    <input type="email" class="form-control" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">Nous ne partageons jamais votre email avec qui
                        que ce
                        soit.</small>
            </div>
            <div class="form-group">
                <label for="InputUsername1">Mot de passe</label>
                <input type="password" class="form-control" id="InputUsername1">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
</div>

<?php
require 'includes/footer.php';
