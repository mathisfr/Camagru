<?php
    ob_start(); 
    $title = "Camagru - Show Pictures";
?>
<main id="showpictures">
    <article id="pictures">
        <?php
            foreach ($pictures as $picture) {
                if (file_exists($picture['path'])){
                    echo '
                    <div class="picture-overlay">
                        <img class="picture" src="'.$picture['path'].'" alt="picture">
                        <div class="picture-buttons">
                            <button class="picture-like-button" data-picture-id="'.$picture['id'].'" ><i class="gg-heart"></i></button>
                            <a class="picture-comment-button" href="commentpicture/'.$picture['id'].'">
                                Comment
                            </a>
                        </div>
                    </div>
                    ';
                }
            }
        ?>
    </article>
</main>
<?
    $content = ob_get_clean();
    require_once(__DIR__.'/../layout.php');
?>