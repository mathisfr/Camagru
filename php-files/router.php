<?php
session_start();

require_once("./src/controllers/userLogin.php");
require_once("./src/controllers/userRegister.php");
require_once("./src/controllers/userUpdate.php");
require_once("./src/controllers/userLogout.php");
require_once("./src/controllers/userConfirmMail.php");
require_once("./src/controllers/pictureUpload.php");
require_once("./src/controllers/showpictures.php");
require_once("./src/tools/Notification.php");
require_once("./src/tools/Utils.php");
require_once("./src/tools/Router.php");

$router = new Router();

$router->addRoute("home", "./templates/pages/home.php", null, null, null);
$router->addRoute("showpictures", "showpictures", 'POST', null, null);
$router->addRoute("makepicture", "./templates/pages/makepicture.php", null, null, null);
$router->addRoute("profile", "./templates/pages/profile.php", null, null, null);
$router->addRoute("logout", "userLogout", null, null, null);

$router->addRoute("userLogin", 'userLogin', 'POST',[
    'username-login',
    'password-login',
], null);
$router->addRoute("userRegister", 'userRegister', 'POST',[
    'username-register',
    'email-register',
    'password-register',
    'password-confirm',
], null);
$router->addRoute("userUpdate", 'userUpdate', 'POST',[
    'username',
    'email',
    'password',
    'password-confirm',
    'delete',
], null);
$router->addRoute("userConfirmMail", 'userConfirmMail', 'GET',[
    'key',
], null);
$router->addRoute("pictureUpload", 'pictureUpload', 'POST', [
    'image'
], null);

$router->run();
