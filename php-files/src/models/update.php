<?php
require_once(__DIR__."/../tools/DatabaseConnection.php");

class Update {
    private DatabaseConnection $db;
    function __construct(){
        $this->db = new DatabaseConnection();
    }
    public function username(string $username){
        $request = $this->db->getConnection()->prepare("UPDATE users SET username=:newusername WHERE username=:username");
        $request->execute([
            ":newusername" =>  $username,
            ":username" =>  User::getUsername(),
        ]);
        $request->closeCursor();
    }
    public function email(string $email){
        $request = $this->db->getConnection()->prepare("UPDATE users SET email=:newemail WHERE username=:username");
        $request->execute([
            ":newemail" =>  $email,
            ":username" =>  User::getUsername(),
        ]);
        $request->closeCursor();
    }
    public function password(string $password){
        $request = $this->db->getConnection()->prepare("UPDATE users SET pass=:newpass WHERE username=:username");
        $request->execute([
            ":newpass" =>  $password,
            ":username" =>  User::getUsername(),
        ]);
        $request->closeCursor();
    }
}