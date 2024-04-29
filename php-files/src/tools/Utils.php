<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function redirect(string $page){
    header("Location: router.php?page=$page");
    exit();
}