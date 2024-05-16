<?
    ob_start();
    $title = "Camagru - Comment Picture"; 
?>
<main id="commentpicture">
    <article>
    <?php echo '<img src="/'.$picture["path"].'" alt="picture">' ?>
    <ul>
        <li>Comment 1</li>
        <li>Comment 2</li>
        <li>Comment 3</li>
    </ul>
    <div>
        <input type="text" name="" id="">
        <button>Comment</button>
    </div>
    </article>
</main>
<?
    $content = ob_get_clean();
    require_once(__DIR__.'/../layout.php');
?>