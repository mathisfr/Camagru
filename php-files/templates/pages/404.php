<? 
    ob_start(); 
    $title = "Camagru - 404";
?>
<main>
    <h1>404 - Page not found</h1>
    <p>Sorry, the page you are looking for does not exist.</p>
</main>
<?
    $content = ob_get_clean();
    require (__DIR__.'/../layout.php');
?>