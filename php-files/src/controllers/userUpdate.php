<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__."/../models/update.php");
require_once(__DIR__."/../tools/Notification.php");
require_once(__DIR__."/../tools/User.php");
function userUpdate($username, $email, $password, $password2){
    $update = new Update();
    $tempPassword = $password;
    if (!User::secureUserInfo($username, $email, $password)){
        Notification::send("L'email n'est pas correct", NOTIFICATION_TYPE[0]);
        redirect("profile");
    }
    if (!empty($email)){
        Notification::send("L'email a ete modifie", NOTIFICATION_TYPE[1]);
        $update->email($email);
    }
    if (!empty($tempPassword)){
        if ($tempPassword == $password2){
            $update->password($password);
            Notification::send("Le mot de passe a ete modifie", NOTIFICATION_TYPE[1]);
        }else{
            Notification::send("Les mots de passe ne sont pas identiques", NOTIFICATION_TYPE[0]);
        }
    }
    
    //The username must be entered last, as it is used for other requests.
    if (!empty($username)){
        $update->username($username);
        Notification::send("Le nom d'utilisateur a ete modifie", NOTIFICATION_TYPE[1]);
    }
    
    User::setUserSession($username, $email, true);
    redirect("profile");
}