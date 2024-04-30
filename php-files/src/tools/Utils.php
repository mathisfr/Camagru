<?php

function redirect(string $page){
    header("Location: router.php?page=$page");
    exit();
}