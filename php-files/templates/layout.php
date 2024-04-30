<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../../styles/global.css">
    <link rel="stylesheet" href="../../styles/home.css">
    <link rel="stylesheet" href="../../styles/header.css">
    <link rel="stylesheet" href="../../styles/icons.css">
    <link rel="stylesheet" href="../../styles/showpictures.css">
    <link rel="stylesheet" href="../../styles/profile.css">
</head>
<body>
    <?php if(isset($_SESSION["debug"])): ?>
    <div id="debug">
        <h2>Debug</h2>
        <p><?= $_SESSION["debug"] ?></p>
    </div>
    <?php endif; ?>
    <?php require_once('header.php');?>
    <?= $content ?>
</body>
</html>