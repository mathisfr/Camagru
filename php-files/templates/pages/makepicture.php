<?php
    ob_start();
    $title = "Camagru - Make Picture"; 
?>
<main id="makepicture">
    <div id="makepicture-preview">
        <img id="makepicture-preview-img" src="./uploads/decos/deco1.png" alt="Preview" data-deco-id="1">
        <video id="makepicture-video"></video>
        <button id="makepicture-button">
            <i class="gg-live-photo"></i>
        </button>
        <button id="makepicture-previous-preview">
            Previous
        </button>
        <button id="makepicture-next-preview">
            Next
        </button>
    </div>
</main>
<?
    $content = ob_get_clean();
    require_once(__DIR__.'/../layout.php');
?>