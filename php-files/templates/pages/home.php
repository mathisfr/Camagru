<? 
    ob_start(); 
    $title = "Camagru - Login";
?>
<main id="home-body">
    <article id="home-popup">
        <section id="home-login">
            <h1>Connexion</h1>
            <form action="router.php?page=userLogin" method="post">
                <input type="text" name="username-login" id="username-login" placeholder="Nom d'utilisateur">
                <input type="password" name="password-login" id="password-login" placeholder="Mot de passe">
                <input class="submit-button" type="submit" value="Se connecter">
            </form>
            <form action="router.php?page=passwordrecovery" method="post">
                <input class="submit-button" name="reset-password" type="submit" value="Mot de passe oublie ?">
            </form>
        </section>
        <section id="home-register">
            <h1>Créer un compte</h1>
            <form action="router.php?page=userRegister" method="post">
                <input type="text" name="username-register" id="username-register" placeholder="Nom d'utilisateur">
                <input type="email" name="email-register" id="email-register" placeholder="Adresse email">
                <input type="password" name="password-register" id="password-register" placeholder="Mot de passe">
                <input type="password" name="password-confirm" id="password-confirm" placeholder="Confirmer le mot de passe">
                <input class="submit-button" type="submit" value="S'inscrire">
            </form>
        </section>
        <section id="home-buttons">
            <button id="home-button-login">Connexion</button>
            <button id="home-button-register">Créer un compte</button>
        </section>
    </article>
</main>
<?
    $content = ob_get_clean();
    require_once(__DIR__.'/../layout.php');
?>