<?php
    if (!isset($_SESSION["loggedUser"])){
        header("Location: router.php?page=home");
        exit();
    }
    $title = "Camagru - Make Picture";
    ob_start(); 
?>
<div>
    <p>Welcome <?php echo $_SESSION["loggedUser"]["username"]; ?></p>
    <p>Make picture</p>
</div>
<?
    $content = ob_get_clean();
    require (__DIR__.'/../layout.php');
?>