<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__."/../models/login.php");
require_once(__DIR__ . "/../tools/Notification.php");
require_once(__DIR__."/../tools/Utils.php");
require_once(__DIR__."/../tools/User.php");
function userLogin(string $username, string $password){  
    if (empty($username) || empty($password)){
        Notification::send("Veuillez remplir tous les champs", NOTIFICATION_TYPE[0]);
        redirect("home");
    }
    else{
        $_SESSION["debug"] = $username;
        $tempEmail = '';
        $tempNull = '';
        User::secureUserInfo($username, $tempNull, $tempNull);
        $login = new Login();
        $userid = 0;
        if (!$login->identify($username, $password, $tempEmail, $userid)){
            Notification::send("Nom d'utilisateur ou mot de passe incorrect", NOTIFICATION_TYPE[0]);
            redirect("home");
        }
        Notification::send("Connexion reussi", NOTIFICATION_TYPE[1]);
        User::setUserSession($userid, $username, $tempEmail, true);
        redirect("makepicture");
    }
}