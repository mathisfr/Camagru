<?php
require_once(__DIR__."/../tools/DatabaseConnection.php");

class Update extends DatabaseConnection {
    public function username(string $username){
        $request = $this->getConnection()->prepare("UPDATE users SET username=:newusername WHERE username=:username");
        $request->execute([
            ":newusername" =>  $username,
            ":username" =>  User::getUsername(),
        ]);
        $request->closeCursor();
    }
    public function email(string $email){
        $request = $this->getConnection()->prepare("UPDATE users SET email=:newemail WHERE username=:username");
        $request->execute([
            ":newemail" =>  $email,
            ":username" =>  User::getUsername(),
        ]);
        $request->closeCursor();
    }
    public function password(string $password){
        $request = $this->getConnection()->prepare("UPDATE users SET pass=:newpass WHERE username=:username");
        $request->execute([
            ":newpass" =>  $password,
            ":username" =>  User::getUsername(),
        ]);
        $request->closeCursor();
    }

    public function delete(int $id){
        $request = $this->getConnection()->prepare("DELETE FROM `users` WHERE id=:id");
        $request->execute([
            ":id" =>  $id,
        ]);
        $request->closeCursor();
    }
}