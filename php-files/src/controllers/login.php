<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__."/../models/login.php");
require_once(__DIR__."/../tools/Utils.php");
require_once(__DIR__."/../tools/User.php");
function login(string $username, string $password){  
    if (empty($username) || empty($password)){
        redirect("home");
    }
    else{
        $tempEmail = '';
        $tempNull = '';
        User::secureUserInfo($username, $tempNull, $tempNull);
        $login = new Login();
        if (!$login->identify($username, $password, $tempEmail)){
            redirect("home");
        }
        User::setUserSession($username, $tempEmail, true);
        redirect("makepicture");
    }
}