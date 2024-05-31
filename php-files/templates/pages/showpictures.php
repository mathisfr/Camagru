<?php
    ob_start(); 
    $title = "Camagru - Show Pictures";
?>
<main id="showpictures">
    <?php if ($_SESSION['nopictures']): ?>
    <article id="no-pictures">
        <p>No pictures to show</p>
    </article>
    <?php else: ?>
    <article id="pictures">
        <?php foreach ($pictures as $picture): ?>
            <?php if (file_exists($picture['path'])): ?>
                <div class="picture-overlay">
                    <img class="picture" src="<?= $picture['path'] ?>" alt="picture">
                    <?php if (User::isLogged()) : ?>
                    <div class="picture-buttons">
                        <button class="<?= $picture['isLiked'] ?>" data-picture-id="<?= $picture['id'] ?>" >
                            Like <?= $picture['likes'] ?>
                        </button>
                        <a class="picture-comment-button" href="pictureShowComment/<?= $picture['id'] ?>">
                            Comment
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </article>
    <form action="/showpictures" method="POST" id="showpictures-paging">
        <input type="submit" name="previous" id="showpictures-previous" value="Previous"/>
        <input type="submit" name="next" id="showpictures-next" value="Next"/>
    </form>
    <?php endif; ?>
</main>
<?
    $content = ob_get_clean();
    require_once(__DIR__.'/../layout.php');
?>