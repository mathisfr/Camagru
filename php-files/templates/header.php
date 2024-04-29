<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    require_once(__DIR__ ."/../src/tools/User.php");
    $isUserLogged = User::isLogged();
?>
<header>
    <h1>Camagru</h1>
    <nav>
        <ul>
            <?php if(!$isUserLogged): ?>
                <li><a href="router.php?page=home">Connexion</a></li>
            <?php endif; ?>
            <li><a href="router.php?page=showpictures">Show Pictures</a></li>
            <li><a href="router.php?page=makepicture">Make Pictures</a></li>
            <?php if ($isUserLogged): ?>
                <li><a href="router.php?page=logout">Logout</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>