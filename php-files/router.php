<?php

if (isset($_GET["page"])){
    if ($_GET["page"] == "home"){
        require("./templates/pages/home.php");
    }elseif ($_GET["page"] == "showpictures"){
        require("./templates/pages/showpictures.php");
    }elseif ($_GET["page"] == "makepicture"){
        require("./templates/pages/makepicture.php");
    }else{
        require("./templates/pages/404.php");
    }
}else{
    require("./templates/pages/home.php");
}