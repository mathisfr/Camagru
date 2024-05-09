<?php
    ob_start(); 
    $title = "Camagru - Show Pictures";
?>
<main id="showpictures">
    <article id="pictures">
        <?php
            foreach ($pictures as $picture) {
                echo '<img class="picture" src="'.$picture['path'].'" alt="picture">';
            }
        ?>
        <img class="picture" src="https://picsum.photos/400/600" alt="picture">
        <img class="picture" src="https://placebear.com/400/600" alt="picture">
        <img class="picture" src="https://placebeard.it/400/600" alt="picture">
        <img class="picture" src="https://loremflickr.com/400/600" alt="picture">
        <img class="picture" src="https://dummyimage.com/400x600/fff/aaa" alt="picture">
    </article>
</main>
<?
    $content = ob_get_clean();
    require_once(__DIR__.'/../layout.php');
?>