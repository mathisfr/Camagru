<?
    ob_start();
    $title = "Camagru - Comment Picture"; 
?>
<main id="commentpicture">
    <?php echo '<img src="/'.$picture["path"].'" alt="picture">' ?>
    <ul id="picture-comments">
    </ul>
    <div>
        <textarea id="picture-textComment-input" name="text" rows="2" cols="50" maxlength="255" required spellcheck="true"></textarea>
        <button id="picture-sendComment-button" class="submit-button-comment" data-picture-id="<?php echo $picture["id"] ?>">Comment</button>
    </div>
</main>
<?
    $content = ob_get_clean();
    require_once(__DIR__.'/../layout.php');
?>