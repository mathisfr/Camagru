<?php
    ob_start();

    $title = "Camagru - 404";
?>
<main id="profile">
    <article id="profile-popup">
        <h1>Profile</h1>
        <form action="router.php?page=userUpdate" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?= User::getUsername() ?>">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= User::getEmail() ?>">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="">
            <label for="password-confirm">Confirm password</label>
            <input type="password" name="password-confirm" id="password-confirm" value="">
            <input class="submit-button" type="submit" value="Update">
            <input class="submit-button" name="delete" type="submit" value="Delete Account">
        </form>
    </article>
</main>
<?php
    $content = ob_get_clean();
    require_once(__DIR__.'/../layout.php');
?>