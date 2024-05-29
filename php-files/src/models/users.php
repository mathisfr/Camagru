<?php
require_once(__DIR__."/../tools/DatabaseConnection.php");
require_once(__DIR__."/../tools/User.php");
class Users extends DatabaseConnection {
    public function getUsername(int $id){
        $request = $this->getConnection()->prepare("SELECT username FROM users WHERE id=:id");
        $request->execute([
            ":id" =>  $id,
        ]);
        $username = $request->fetch(PDO::FETCH_ASSOC);
        $request->closeCursor();
        return strip_tags($username["username"]);
    }

    public function getEmail(int $id){
        $request = $this->getConnection()->prepare("SELECT email FROM users WHERE id=:id");
        $request->execute([
            ":id" =>  $id,
        ]);
        $email = $request->fetch(PDO::FETCH_ASSOC);
        $request->closeCursor();
        return strip_tags($email["email"]);
    }

    public function getUserByEmail(string $email){
        $user = [];
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            return $user;
        }
        $request = $this->getConnection()->prepare("SELECT * FROM users WHERE email=:email");
        $request->execute([
            ":email" =>  $email,
        ]);
        $user = $request->fetch(PDO::FETCH_ASSOC);
        $request->closeCursor();
        $nullparam = null;
        User::secureUserInfo($user["username"], $user["email"], $nullparam);
        return $user;
    }
}