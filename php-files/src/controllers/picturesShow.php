<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once (__DIR__ . "/../models/pictures.php");
require_once(__DIR__ . "/../tools/Notification.php");
require_once(__DIR__ . "/../tools/Utils.php");
require_once(__DIR__ . "/../tools/User.php");

function picturesShow(){
    $picturesSQL = new Pictures();
    $pictures = $picturesSQL->receiveAll();
    foreach ($pictures as &$picture) {
        if ($picturesSQL->isLikedByUser(User::getUserId(), $picture['id'])){
            $picture['isLiked'] = "picture-unlike-button";
            $picture['text'] = "UnLike";
        }else{
            $picture['isLiked'] = "picture-like-button";
            $picture["text"] = "Like";
        }
    }
    unset($picture);
    require_once(__DIR__."/../../templates/pages/showpictures.php");
}