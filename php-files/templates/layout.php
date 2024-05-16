<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/styles/global.css">
    <link rel="stylesheet" href="/styles/home.css">
    <link rel="stylesheet" href="/styles/header.css">
    <link rel="stylesheet" href="/styles/icons.css">
    <link rel="stylesheet" href="/styles/showpictures.css">
    <link rel="stylesheet" href="/styles/profile.css">
    <link rel="stylesheet" href="/styles/makepicture.css">
    <link rel="stylesheet" href="/styles/notification.css">
</head>
<body>
    <?php require_once('header.php');?>
    <?= $content ?>
    <?php 
        Notification::get();
    ?>
    <script type="module" src="/js/app.js"></script>
</body>
</html>