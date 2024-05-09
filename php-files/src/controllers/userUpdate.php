<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__."/../models/update.php");
require_once(__DIR__."/../tools/Notification.php");
require_once(__DIR__."/../tools/User.php");
function userUpdate($username, $email, $password, $password2, $delete){
    $update = new Update();
    if ($delete != null){
        $update->delete(User::getUsername());
        Notification::send("Votre compte a ete supprime", NOTIFICATION_TYPE[1]);
        redirect("logout");
    }
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
    
    User::setUserSession(null, $username, $email, true);
    redirect("profile");
}