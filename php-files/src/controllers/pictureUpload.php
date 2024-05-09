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
    $namefile =  time() . '_'. User::getUsername() .'.png';
    $filePathSave = __DIR__.'/../../uploads/image_' . $namefile;
    $filePathBdd = 'uploads/image_' . $namefile;
    file_put_contents($filePathSave, $imageDecode);
    $pictures = new Pictures();
    $pictures->send(User::getUserId(), $filePathBdd);
    echo $filePathSave;
}