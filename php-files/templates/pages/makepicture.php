<?php
    ob_start();
    $title = "Camagru - Make Picture"; 
?>
<main id="makepicture">
    <video id="makepicture-video"></video>
    <button id="makepicture-button">
        <i class="gg-live-photo"></i>
    </button>
</main>
<?
    $content = ob_get_clean();
    require_once(__DIR__.'/../layout.php');
?>