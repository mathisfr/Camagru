<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    require_once(__DIR__."/../../src/tools/User.php");
    require_once(__DIR__."/../../src/tools/Utils.php");
    if (!User::isLogged()){
        redirect("home");
    }
    $title = "Camagru - Make Picture";
    ob_start(); 
?>
<div>
    <p>Welcome <?= User::getUsername() ?></p>
    <p>Make picture</p>
</div>
<?
    $content = ob_get_clean();
    require_once(__DIR__.'/../layout.php');
?>