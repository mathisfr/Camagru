<?php
    ob_start(); 
    $title = "Camagru - Show Pictures";
?>
<main id="showpictures">
    <article id="pictures">
        <img class="picture" src="https://placehold.co/600x400/png" alt="picture">
        <img class="picture" src="https://placehold.co/600x400/png" alt="picture">
        <img class="picture" src="https://placehold.co/600x400/png" alt="picture">
        <img class="picture" src="https://placehold.co/600x400/png" alt="picture">
        <img class="picture" src="https://placehold.co/600x400/png" alt="picture">
    </article>
</main>
<?
    $content = ob_get_clean();
    require_once(__DIR__.'/../layout.php');
?>