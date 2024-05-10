<?php

function redirect(string $page){
    header("Location: router.php?page=$page");
    exit();
}

function base64DataToImage(string $imageData){
    $filteredData = substr($imageData, strpos($imageData, ",") + 1);
    $decodedData = base64_decode(str_replace(' ', '+', $filteredData));
    return $decodedData;
}

function isImageJPG(string $imageData): bool{
    // MAGIC NUMBER JPG = FF D8 FF
    for($i = 0; $i < 3; $i++){
        if (ord($imageData[$i]) != [255, 216, 255,][$i]){
            return false;
        }
    }
    return true;
}

function saveImage($imageData, $quality): string{
    $namefile =  time() . '_'. User::getUsername() .'.jpg';
    $filePathSave = __DIR__.'/../../uploads/image_' . $namefile;
    $publicPath = 'uploads/image_' . $namefile;
    $image = imagecreatefromstring($imageData);
    imagejpeg($image, $filePathSave, $quality);
    return $publicPath;
}