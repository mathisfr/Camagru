<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__."/../models/update.php");
require_once(__DIR__."/../tools/User.php");
function userUpdate($username, $email, $password, $password2){
    $update = new Update();
    $tempPassword = $password;
    if (!User::secureUserInfo($username, $email, $password)){
        redirect("profile");
    }
    if (!empty($email)){
        $update->email($email);
    }
    if (!empty($tempPassword)){
        if ($tempPassword == $password2){
            $update->password($password);
        }
    }
    
    //The username must be entered last, as it is used for other requests.
    if (!empty($username)){
        $update->username($username);
    }
    
    User::setUserSession($username, $email, true);
    redirect("profile");
}