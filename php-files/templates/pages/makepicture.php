<?php
    ob_start();
    $title = "Camagru - Make Picture"; 
?>
<main id="makepicture">
    <div id="makepicture-preview">
        <img id="makepicture-preview-img" src="./uploads/decos/deco1.png" alt="Preview" data-deco-id="1">
        <div id="makepicture-video-enabled">
            <video id="makepicture-video"></video>
            <button id="makepicture-button">
                <i class="gg-live-photo"></i>
            </button>
        </div>
        <div id="makepicture-video-disabled">
            <img id="picture-image-preview" src="">
            <div id="makepicture-import-form">
                <input type="file" name="picture-import" id="picture-import" accept="image/*" value="Import Picture">
                <input type="submit" name="picture-upload" id="picture-upload" value="Upload">
            </div>
        </div>
        <button id="makepicture-previous-preview">
        </button>
        <button id="makepicture-next-preview">
        </button>
    </div>
</main>
<?
    $content = ob_get_clean();
    require_once(__DIR__.'/../layout.php');
?>