<?php
session_start();
require_once("./src/controllers/login.php");
require_once("./src/controllers/register.php");
require_once("./src/tools/Utils.php");
if (isset($_GET["page"])){
    if ($_GET["page"] == "home"){
        require("./templates/pages/home.php");
    }elseif ($_GET["page"] == "showpictures"){
        require("./templates/pages/showpictures.php");
    }elseif ($_GET["page"] == "makepicture"){
        require("./templates/pages/makepicture.php");
    }elseif ($_GET["page"] == "login"){
        if(isset($_POST["username-login"]) && isset($_POST["password-login"])){
            login($_POST["username-login"], $_POST["password-login"]);
        }else{
            redirect("home");
        }
    }elseif ($_GET["page"] == "register"){
        if(isset($_POST["username-register"]) && isset($_POST["password-register"]) && isset($_POST["password-confirm"]) && isset($_POST["email-register"])){
            register($_POST["username-register"], $_POST["email-register"], $_POST["password-register"], $_POST["password-confirm"]);
        }else{
            redirect("home");
        }
    }
    elseif ($_GET["page"] == "logout"){
        session_destroy();
        redirect("home");
    }else{
        require("./templates/pages/404.php");
    }
}else{
    require("./templates/pages/home.php");
}