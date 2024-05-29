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

    public function isLikedByUser(int $userId, int $pictureId): bool{
        $request = $this->getConnection()->prepare("SELECT * FROM `picturesLikes` WHERE `picture_id`=:pictureId AND `user_id`=:userId");
        $request->bindParam(":pictureId", $pictureId, PDO::PARAM_INT);
        $request->bindParam(":userId", $userId, PDO::PARAM_INT);
        $request->execute();
        $isLiked = $request->rowCount() == 0 ? false : true;
        $request->closeCursor();
        return $isLiked;
    }
    
    public function receiveById($id){
        $request = $this->getConnection()->prepare("SELECT * FROM `pictures` WHERE `id`=:pictureId");
        $request->bindParam(":pictureId", $id, PDO::PARAM_INT);
        $request->execute();
        $picture = $request->fetch(PDO::FETCH_ASSOC);
        $request->closeCursor();
        return $picture;
    }

    public function getComments(int $pictureId){
        $request = $this->getConnection()->prepare("SELECT * FROM `picturesComments` WHERE `picture_id`=:pictureId");
        $request->bindParam(":pictureId", $pictureId, PDO::PARAM_INT);
        $request->execute();
        $comments = $request->fetchAll();
        $request->closeCursor();
        return $comments;
    }
    public function send(int $userId, string $path){
        $securePath = strip_tags($path);
        $request = $this->getConnection()->prepare("INSERT INTO `pictures`(`user_id`, `path`) VALUES (:userId, :pathName)");
        $request->bindParam(":userId", $userId, PDO::PARAM_INT);
        $request->bindParam(":pathName", $securePath, PDO::PARAM_STR);
        $request->execute();
        $request->closeCursor();
    }

    public function sendComment(int $pictureId, int $userId, string $comment){
        $secureComment = strip_tags($comment);
        $request = $this->getConnection()->prepare("INSERT INTO `picturesComments`(`picture_id`, `user_id`, `comment`) VALUES (:pictureId, :userId, :comment)");
        $request->bindParam(":pictureId", $pictureId, PDO::PARAM_INT);
        $request->bindParam(":userId", $userId, PDO::PARAM_INT);
        $request->bindParam(":comment", $secureComment, PDO::PARAM_STR);
        $request->execute();
        $request->closeCursor();
    }

    public function like(int $userId, int $pictureId): bool{
        $request = $this->getConnection()->prepare("SELECT * FROM `picturesLikes` WHERE `picture_id`=:pictureId AND `user_id`=:userId");
        $request->bindParam(":pictureId", $pictureId, PDO::PARAM_INT);
        $request->bindParam(":userId", $userId, PDO::PARAM_INT);
        $request->execute();
        $isLiked = $request->rowCount() == 0 ? false : true;
        $request->closeCursor();
        if ($isLiked){
            $request = $this->getConnection()->prepare("DELETE FROM `picturesLikes` WHERE `picture_id`=:pictureId AND `user_id`=:userId");
        }else{
            $request = $this->getConnection()->prepare("INSERT INTO `picturesLikes`(`picture_id`, `user_id`) VALUES (:pictureId, :userId)");
        }
        $request->bindParam(":pictureId", $pictureId, PDO::PARAM_INT);
        $request->bindParam(":userId", $userId, PDO::PARAM_INT);
        $request->execute();
        $request->closeCursor();
        return !$isLiked;
    }
}