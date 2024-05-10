<?php 
    require_once(__DIR__ ."/../src/tools/User.php");
    $isUserLogged = User::isLogged();
?>
<header>
    <h1>Camagru</h1>
    <nav id="nav-menu">
        <ul>
            <?php if(!$isUserLogged): ?>
                <li><a href="router.php?page=home">Connexion</a></li>
                <div class="nav-separator"></div>
            <?php endif; ?>
            <li><a href="showpictures">Show Pictures</a></li>
            <?php if ($isUserLogged): ?>
                <div class="nav-separator"></div>
                <li><a href="router.php?page=makepicture">Make Pictures</a></li>
                <div class="nav-separator"></div>
                <li><a href="router.php?page=profile">Profile</a></li>
                <div class="nav-separator"></div>
                <li><a href="router.php?page=logout">Logout</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <li id="nav-hamburger"><i class="gg-menu"></i></li>
</header>