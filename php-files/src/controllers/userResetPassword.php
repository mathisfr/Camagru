<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once (__DIR__ . "/../models/users.php");
require_once (__DIR__ . "/../models/email.php");
require_once (__DIR__ . "/../tools/Notification.php");

function userResetPassword(string $email)
{
    Notification::send("L'email a ete envoye", NOTIFICATION_TYPE[1]);
    if (empty($email)){
        redirect("home");
    }
    $users = new Users();
    $user = $users->getUserByEmail($email);
    if(empty($user) || $user["emailVerified"] == 0){
        redirect("home");
    }

    Email::sendMailResetPassword($user["email"], $user["id"]);
    redirect("home");
}

function userConfirmResetPassword(string $userKey)
{
    if (empty($userKey)){
        Notification::send("Impossible de reinitialiser le mot de passe", NOTIFICATION_TYPE[0]);
        redirect("home");
    }

    $emailSQL = new Email();
    if ($emailSQL->confirmationResetPassword($userKey)) {
        Notification::send("Reinitialisation de mot de passe par email reussi, vous pouvez vous connectez", NOTIFICATION_TYPE[1]);
    }else{
        Notification::send("La Reinitialisation de mot de passe par email a echoue", NOTIFICATION_TYPE[0]);
    }

    redirect("home");
}