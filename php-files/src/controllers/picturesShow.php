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
    require_once(__DIR__."/../../templates/pages/showpictures.php");
}