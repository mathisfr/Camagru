<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['paging'])){
    $_SESSION['paging'] = 0;
}

require_once (__DIR__ . "/../models/pictures.php");
require_once(__DIR__ . "/../tools/Notification.php");
require_once(__DIR__ . "/../tools/Utils.php");
require_once(__DIR__ . "/../tools/User.php");

function picturesShow(?string $next, ?string $previous){
    if ($next){
        $_SESSION['paging'] += 1;
    }else if ($previous){
        $_SESSION['paging'] -= 1;
    }
    $pictures = getPicturesFromOffset();
    require_once(__DIR__."/../../templates/pages/showpictures.php");
}

function getPicturesFromOffset(){
    $picturesSQL = new Pictures();
    $maxImages = $picturesSQL->numberOfImages();
    $maxPages = ceil($maxImages / 5)- 1;
    if ($_SESSION['paging'] < 0){
        $_SESSION['paging'] = $maxPages;
    }else if ($_SESSION['paging'] > $maxPages){
        $_SESSION['paging'] = 0;
    }
    $_SESSION['paging'] *= 5;
    $pictures = $picturesSQL->receiveLimit($_SESSION['paging']);
    foreach ($pictures as &$picture) {
        if ($picturesSQL->isLikedByUser(User::getUserId(), $picture['id'])){
            $picture['isLiked'] = "picture-unlike-button";
        }else{
            $picture['isLiked'] = "picture-like-button";
        }
        $picture["likes"] = $picturesSQL->numberOfLikes($picture['id']);
    }
    unset($picture);
    return $pictures;
}