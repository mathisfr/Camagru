<?php
ini_set('session.cache_limiter','public');
session_cache_limiter('false');
session_start();

require_once ("./src/controllers/userLogin.php");
require_once ("./src/controllers/userRegister.php");
require_once ("./src/controllers/userUpdate.php");
require_once ("./src/controllers/userLogout.php");
require_once ("./src/controllers/userConfirmMail.php");
require_once ("./src/controllers/pictureUpload.php");
require_once ("./src/controllers/pictureLike.php");
require_once ("./src/controllers/picturesShow.php");
require_once ("./src/controllers/pictureShowComment.php");
require_once ("./src/controllers/pictureSendComment.php");
require_once ("./src/controllers/pictureGetComments.php");
require_once ("./src/controllers/userResetPassword.php");
require_once ("./src/tools/Notification.php");
require_once ("./src/tools/Utils.php");
require_once ("./src/tools/Router.php");

$router = new Router();

$loggedMiddleware = function () {
    if (!User::isLogged()) {
        Notification::send("Vous devez être connecté pour accéder à cette page", NOTIFICATION_TYPE[0]);
        redirect("home");
        return false;
    }
    return true;
};

$logoutMiddleware = function () {
    if (User::isLogged()) {
        Notification::send("Vous ne devez pas être connecté pour accéder à cette page", NOTIFICATION_TYPE[0]);
        redirect("showpictures");
        return false;
    }
    return true;
};

$router->addRoute("home", "./templates/pages/home.php", null, null, $logoutMiddleware);
$router->addRoute("makepicture", "./templates/pages/makepicture.php", null, null, $loggedMiddleware);
$router->addRoute("profile", "./templates/pages/profile.php", null, null, $loggedMiddleware);
$router->addRoute("logout", "userLogout", null, null, $loggedMiddleware);
$router->addRoute("passwordrecovery", "./templates/pages/passwordrecovery.php", null, null, $logoutMiddleware);

$router->addRoute("showpictures", "picturesShow", 'POST', [
    'next',
    'previous'
], null);

$router->addRoute("userLogin", 'userLogin', 'POST', [
    'username-login',
    'password-login',
], $logoutMiddleware);

$router->addRoute("userRegister", 'userRegister', 'POST', [
    'username-register',
    'email-register',
    'password-register',
    'password-confirm',
], $logoutMiddleware);

$router->addRoute("userUpdate", 'userUpdate', 'POST', [
    'username',
    'email',
    'password',
    'password-confirm',
    'delete',
], $loggedMiddleware);

$router->addRoute("userConfirmMail", 'userConfirmMail', 'GET', [
    'key',
], $logoutMiddleware);

$router->addRoute("userResetPassword", 'userResetPassword', 'POST', [
    'email',
], $logoutMiddleware);

$router->addRoute("userConfirmResetPassword", 'userConfirmResetPassword', 'GET', [
    'key',
], $logoutMiddleware);


$router->addRoute("pictureUploadAjax", 'pictureUploadAjax', 'POST', [
    'image',
    'deco'
], $loggedMiddleware);

$router->addRoute("pictureLikeAjax", 'pictureLikeAjax', 'POST', [
    'id'
], $loggedMiddleware);

$router->addRoute("pictureShowComment", 'pictureShowComment', 'GET', [
    'id'
], $loggedMiddleware);

$router->addRoute("pictureSendCommentAjax", 'pictureSendCommentAjax', 'POST', [
    'id',
    'comment'
], $loggedMiddleware);

$router->addRoute("pictureGetCommentsAjax", 'pictureGetCommentsAjax', 'POST', [
    'id',
], $loggedMiddleware);

$router->run();
