<?php
    ob_start();
    
    $title = "Camagru - Make Picture"; 
?>
<main>
    <h1>Make picture</h1>
</main>
<?
    $content = ob_get_clean();
    require_once(__DIR__.'/../layout.php');
?>