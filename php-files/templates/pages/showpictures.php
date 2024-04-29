<?php
    $title = "Camagru - Show Pictures";
    ob_start(); 
?>
<div>
    <p>Picture show</p>
</div>
<?
    $content = ob_get_clean();
    require (__DIR__.'/../layout.php');
?>