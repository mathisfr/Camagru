<?php
session_start();

require_once("./src/controllers/userLogin.php");
require_once("./src/controllers/userRegister.php");
require_once("./src/controllers/userUpdate.php");
require_once("./src/tools/Utils.php");
require_once("./src/tools/Router.php");

$router = new Router();

$router->addRoute("home", "./templates/pages/home.php",null, null);
$router->addRoute("showpictures", "./templates/pages/showpictures.php", null, null);
$router->addRoute("makepicture", "./templates/pages/makepicture.php", null, null);
$router->addRoute("profile", "./templates/pages/profile.php", null, null);

/*$router->addRoute("userLogin", null, null);
$router->addRoute("userRegister", null, null);
$router->addRoute("userUpdate", null, null);*/
$router->run();
/*if (isset($_GET["page"])){
    if ($_GET["page"] == "home"){
        require("./templates/pages/home.php");
    }elseif ($_GET["page"] == "showpictures"){
        require("./templates/pages/showpictures.php");
    }elseif ($_GET["page"] == "makepicture"){
        if (!User::isLogged()){
            redirect("404");
        }
        require("./templates/pages/makepicture.php");
    }elseif ($_GET["page"] == "login"){
        if (User::isLogged()){
            redirect("404");
        }
        if(isset($_POST["username-login"]) && isset($_POST["password-login"])){
            login($_POST["username-login"], $_POST["password-login"]);
        }else{
            redirect("home");
        }
    }elseif ($_GET["page"] == "register"){
        if (User::isLogged()){
            redirect("404");
        }
        if(isset($_POST["username-register"]) && isset($_POST["password-register"]) && isset($_POST["password-confirm"]) && isset($_POST["email-register"])){
            register($_POST["username-register"], $_POST["email-register"], $_POST["password-register"], $_POST["password-confirm"]);
        }else{
            redirect("404");
        }
    }elseif ($_GET["page"] == "update"){
        if (!User::isLogged()){
            redirect("404");
        }
        if(isset($_POST["username"]) || isset($_POST["email"]) || isset($_POST["password"]) || isset($_POST["password-confirm"])){
            update($_POST["username"], $_POST["email"], $_POST["password"], $_POST["password-confirm"]);
        }
    }
    elseif ($_GET["page"] == "logout"){
        session_destroy();
        redirect("home");
    }elseif ($_GET["page"] == "profile"){
        if (!User::isLogged()){
            redirect("404");
        }
        require("./templates/pages/profile.php");
    }
    else{
        require("./templates/pages/404.php");
    }
}else{
    require("./templates/pages/home.php");
}*/