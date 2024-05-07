<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__."/../models/email.php");
require_once(__DIR__ . "/../tools/Notification.php");
function userConfirmMail(string $userKey){  
    if (empty($userKey)){
        Notification::send("La confirmation de l'email a echoue", NOTIFICATION_TYPE[0]);
    }
    else{
        $emailSQL = new Email();
        if ($emailSQL->confirmation($userKey)) {
            Notification::send("Confirmation par email reussi, vous pouvez vous connectez", NOTIFICATION_TYPE[1]);
        }else{
            Notification::send("La confirmation de l'email a echoue", NOTIFICATION_TYPE[0]);
        }
    }
    redirect("home");
}