<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once (__DIR__ . "/../models/update.php");
require_once (__DIR__ . "/../models/register.php");
require_once (__DIR__ . "/../models/email.php");
require_once (__DIR__ . "/../tools/User.php");
require_once (__DIR__ . "/../tools/Notification.php");

function userRegister($username, $email, $password, $password2)
{
    if (empty($username) || empty($password) || empty($password2) || empty($email)) {
        Notification::send("Veuillez remplir tous les champs", NOTIFICATION_TYPE[0]);
        redirect("home");
    } else {
        if ($password != $password2) {
            Notification::send("Les mots de passe ne sont pas indentique", NOTIFICATION_TYPE[0]);
            redirect("home");
        }
        if (!User::secureUserInfo($username, $email, $password)) {
            Notification::send("L'email n'est pas correct", NOTIFICATION_TYPE[0]);
            redirect("home");
        }
        $register = new Register();
        $id = $register->addUser($username, $email, $password);
        if (!Email::sendMail($email, $id)) {
            $update = new Update();
            $update->delete($id);
            Notification::send("Impossible d'envoyer l'email de confirmation", NOTIFICATION_TYPE[0]);
            redirect("home");
        }
        Notification::send("Email de confirmation envoye", NOTIFICATION_TYPE[1]);
        redirect("home");
    }
}