<? 
    ob_start(); 
    $title = "Camagru - 403";
?>
<main>
    <h1>403 - Forbidden</h1>
    <p>Sorry, you are not allowed to access this page.</p>
</main>
<?
    $content = ob_get_clean();
    require (__DIR__.'/../layout.php');
?>