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
