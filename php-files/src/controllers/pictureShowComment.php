<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once (__DIR__ . "/../models/pictures.php");
require_once(__DIR__ . "/../tools/Notification.php");
require_once(__DIR__ . "/../tools/Utils.php");
require_once(__DIR__ . "/../tools/User.php");
function pictureShowComment($id){
    $picturesSQL = new Pictures();
    $picture = $picturesSQL->receiveById($id);
    require_once(__DIR__."/../../templates/pages/commentpicture.php");
}