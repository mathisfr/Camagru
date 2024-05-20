<?php
require_once(__DIR__."/../tools/DatabaseConnection.php");

class Users extends DatabaseConnection {
    public function getUsername(int $id){
        $request = $this->getConnection()->prepare("SELECT username FROM users WHERE id=:id");
        $request->execute([
            ":id" =>  $id,
        ]);
        $username = $request->fetch(PDO::FETCH_ASSOC);
        $request->closeCursor();
        return $username["username"];
    }
}