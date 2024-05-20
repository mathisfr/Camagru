<?
    ob_start();
    $title = "Camagru - Comment Picture"; 
?>
<main id="commentpicture">
    <article>
    <?php echo '<img src="/'.$picture["path"].'" alt="picture">' ?>
    <ul id="picture-comments">
    </ul>
    <div>
        <input id="picture-textComment-input" type="text" name="" id="">
        <button id="picture-sendComment-button" data-picture-id="<?php echo $picture["id"] ?>">Comment</button>
    </div>
    </article>
</main>
<?
    $content = ob_get_clean();
    require_once(__DIR__.'/../layout.php');
?>