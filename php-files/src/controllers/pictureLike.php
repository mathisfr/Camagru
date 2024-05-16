<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__."/../models/pictures.php");
require_once(__DIR__ . "/../tools/Notification.php");
require_once(__DIR__ . "/../tools/User.php");
require_once(__DIR__ . "/../tools/Utils.php");
function pictureLike($id){
    $pictures = new Pictures();
    $isLiked = $pictures->like(User::getUserId(), intval($id)) ? "Image likée" : "Image unlikée";
    echo $isLiked;
}