<?php
class User{
    public static function getUserId(){
        if(isset($_SESSION["userid"])){
            return $_SESSION["userid"];
        }
        return 0;
    }
    public static function getUsername(): string
    {
        if (isset($_SESSION["username"])) {
            return $_SESSION["username"];
        }
        return '';
    }
    public static function getEmail(): string
    {
        if (isset($_SESSION["useremail"])) {
            return $_SESSION["useremail"];
        }
        return '';
    }
    public static function isLogged(): bool
    {
        if (isset($_SESSION["userlogged"]) && $_SESSION["userlogged"] === true) {
            return true;
        }
        return false;
    }
    public static function setUserSession(?int $userid, ?string $username, ?string $tempEmail, ?bool $logged)
    {
        if (!is_null($userid)) {
            $_SESSION["userid"] = $userid;
        }
        if (!is_null($username) && $username !== '') {
            $_SESSION["username"] = $username;
        }
        if (!is_null($tempEmail) && $tempEmail !== '') {
            $_SESSION["useremail"] = $tempEmail;
        }
        if (!is_null($logged)) {
            $_SESSION["userlogged"] = $logged;
        }
    }
    public static function secureUserInfo(?string &$username, ?string &$email, ?string &$password): bool
    {
        if (!empty($username)){
            $username = strip_tags($username);
        }
        if (!empty($email)){
            $email = strip_tags($email);
        }
        if (!empty($password)){
            $password = password_hash($password, PASSWORD_DEFAULT);
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            return false;
        }
        return true;
    }
}