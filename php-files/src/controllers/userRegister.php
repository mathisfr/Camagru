<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__."/../models/register.php");
require_once(__DIR__."/../tools/User.php");
function userRegister($username, $email, $password, $password2){
    if (empty($username) || empty($password) || empty($password2) || empty($email)){
        redirect("home");
    }
    else{
        if ($password != $password2){
            redirect("home");
        }
        if (!User::secureUserInfo($username, $email, $password)){
            redirect("home");
        }
        $register = new Register();
        $register->addUser($username, $email, $password);
        User::setUserSession($username, $email, true);
        redirect("makepicture");
    }
}