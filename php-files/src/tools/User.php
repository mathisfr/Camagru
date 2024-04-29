<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class User{
    public static function getUsername(): string{
        if (isset($_SESSION["username"])){
            return $_SESSION["username"];
        }
        return '';
    }
    public static function getEmail(): string{
        if (isset($_SESSION["useremail"])){
            return $_SESSION["useremail"];
        }
        return '';
    }
    public static function isLogged(): bool{
        if (isset($_SESSION["userlogged"]) && $_SESSION["userlogged"] === true){
            return true;
        }
        return false;
    }
    public static function setUserSession(?string $username, ?string $tempEmail, ?bool $logged){
        if (!is_null($username) && $username !== ''){
            $_SESSION["username"] = $username;
        }
        if (!is_null($tempEmail) && $tempEmail !== ''){
            $_SESSION["useremail"] = $tempEmail;
        }
        if (!is_null($logged)){
            $_SESSION["userlogged"] = $logged;
        }
    }
    public static function secureUserInfo(?string &$username, ?string &$email, ?string &$password): bool{
        $username = strip_tags($username);
        $email = strip_tags($email);
        $password = password_hash($password, PASSWORD_DEFAULT);
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            return false;
        }
        return true;
    }
}