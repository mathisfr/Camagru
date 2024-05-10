<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once(__DIR__."/../models/pictures.php");
require_once(__DIR__ . "/../tools/Notification.php");
require_once(__DIR__ . "/../tools/Utils.php");
require_once(__DIR__ . "/../tools/User.php");

function pictureUpload(string $image){
    if ($image == null){
        Notification::send("Veuillez selectionner une image", NOTIFICATION_TYPE[0]);
        redirect("makepicture");
    }
    $imageDecode = base64DataToImage($image);
    if (!isImageJPG($imageDecode)){
        Notification::send("L'image n'est pas au format JPG", NOTIFICATION_TYPE[0]);
        redirect("makepicture");
    }
    $publicPath = saveImage($imageDecode, 75);
    $pictures = new Pictures();
    $pictures->send(User::getUserId(), $publicPath);
    echo "Image envoyée avec succès";
}