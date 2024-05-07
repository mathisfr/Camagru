<?php
require_once(__DIR__ ."/../tools/Utils.php");
function userLogout(){
    session_destroy();
    redirect("home");
}