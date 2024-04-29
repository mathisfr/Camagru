<? 
    $title = "Camagru - Login";
    ob_start(); 
?>
<div id="home-body">
    <div id="home-popup">
        <div id="home-login">
            <h1>Connexion</h1>
            <form action="processing/login.php" method="post">
                <input type="text" name="username-login" id="username-login" placeholder="Nom d'utilisateur">
                <input type="password" name="password-login" id="password-login" placeholder="Mot de passe">
                <input type="submit" value="Se connecter">
            </form>
        </div>
        <div id="home-register">
            <h1>Créer un compte</h1>
            <form action="" method="post">
                <input type="text" name="username-register" id="username-register" placeholder="Nom d'utilisateur">
                <input type="email" name="email-register" id="email-register" placeholder="Adresse email">
                <input type="password" name="password-register" id="password-register" placeholder="Mot de passe">
                <input type="password" name="password-confirm" id="password-confirm" placeholder="Confirmer le mot de passe">
                <input type="submit" value="S'inscrire">
            </form>
        </div>
        <div id="home-buttons">
            <button id="home-button-login">Connexion</button>
            <button id="home-button-register">Créer un compte</button>
        </div>
    </div>
</div>
<script type="text/javascript" src="../../js/app.js"></script>
<?
    $content = ob_get_clean();
    require (__DIR__.'/../layout.php');
?>