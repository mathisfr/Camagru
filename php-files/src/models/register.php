<?php
require_once(__DIR__."/../tools/DatabaseConnection.php");
class Register {
    private DatabaseConnection $db;
    function __construct(){
        $this->db = new DatabaseConnection();
    }
    public function addUser(string $username, string $email, string $password){
        $request = $this->db->getConnection()->prepare("INSERT INTO `users`(`username`, `email`, `pass`) VALUES (:username,:email,:pass)");
        $request->execute([
            ":username" =>  $username,
            ":email" => $email,
            ":pass" => $password,
        ]);
        $request->closeCursor();
    }
}