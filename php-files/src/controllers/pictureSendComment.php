<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once (__DIR__ . "/../models/pictures.php");
require_once(__DIR__ . "/../tools/Notification.php");
require_once(__DIR__ . "/../tools/Utils.php");
require_once(__DIR__ . "/../tools/User.php");
function pictureSendComment($id, $comment){
    $picturesSQL = new Pictures();
    $picturesSQL->sendComment($id, User::getUserId(), $comment);
    echo "Commentaire envoyé";
}