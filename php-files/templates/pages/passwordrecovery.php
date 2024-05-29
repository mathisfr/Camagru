<? 
    ob_start(); 
    $title = "Camagru - Login";
?>
<main id="passwordrecovery">
    <article id="passwordrecovery-popup">
        <h1>Mot de passe oublie</h1>
        <form action="router.php?page=userResetPassword" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="name@domain.com">
            <input class="submit-button" name="submit" type="submit" value="Send mail">
        </form>
    </article>
</main>
<?
    $content = ob_get_clean();
    require_once(__DIR__.'/../layout.php');
?>