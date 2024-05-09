<?php
require_once(__DIR__."/../tools/DatabaseConnection.php");
class Pictures extends DatabaseConnection{

    public function receiveAll(){
        $request = $this->getConnection()->prepare("SELECT * FROM `pictures` ORDER BY `id` DESC");
        $request->execute();
        $pictures = $request->fetchAll();
        $request->closeCursor();
        return $pictures;
    }
    public function send(int $userId, string $path){
        $request = $this->getConnection()->prepare("INSERT INTO `pictures`(`user_id`, `path`) VALUES (:userId, :pathName)");
        $request->bindParam(":userId", $userId, PDO::PARAM_INT);
        $request->bindParam(":pathName", $path, PDO::PARAM_STR);
        $request->execute();
        $request->closeCursor();
    }
}