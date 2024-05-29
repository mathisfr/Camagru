<?php
    ob_start(); 
    $title = "Camagru - Show Pictures";
?>
<main id="showpictures">
    <article id="pictures">
        <?php foreach ($pictures as $picture): ?>
            <?php if (file_exists($picture['path'])): ?>
                <div class="picture-overlay">
                    <img class="picture" src="<?= $picture['path'] ?>" alt="picture">
                    <div class="picture-buttons">
                        <button class="<?= $picture['isLiked'] ?>" data-picture-id="<?= $picture['id'] ?>" >
                        <?= $picture['text'] ?>
                        </button>
                        <a class="picture-comment-button" href="pictureShowComment/<?= $picture['id'] ?>">
                            Comment
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </article>
</main>
<?
    $content = ob_get_clean();
    require_once(__DIR__.'/../layout.php');
?>