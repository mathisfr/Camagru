<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/home.css">
</head>
<body>
    <div id="home-popup">
        <div id="home-login">
            <h1>Connexion</h1>
            <form action="" method="post">
                <input type="text" name="username" id="username-login" placeholder="Nom d'utilisateur">
                <input type="password" name="password" id="password-login" placeholder="Mot de passe">
                <input type="submit" value="Se connecter">
            </form>
        </div>
        <div id="home-register">
            <h1>Inscription</h1>
            <form action="" method="post">
                <input type="text" name="username" id="username-register" placeholder="Nom d'utilisateur">
                <input type="email" name="email" id="email-register" placeholder="Adresse email">
                <input type="password" name="password" id="password-register" placeholder="Mot de passe">
                <input type="password" name="password-confirm" id="password-confirm" placeholder="Confirmer le mot de passe">
                <input type="submit" value="S'inscrire">
            </form>
        </div>
        <div id="home-buttons">
            <button id="home-button-login">Connexion</button>
            <button id="home-button-register">Créer un compte</button>
        </div>
    </div>
    <script type="text/javascript" src="js/app.js"></script>
</body>
</html>