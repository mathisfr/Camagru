<?php
define('NOTIFICATION_TYPE', array(
    'error',
    'info',
));
class Notification{
    static public function send(string $message, string $type){
        $_SESSION['notification'] = array(
            'message' => $message,
            'type' => $type,
        );
    }
    static public function get(){
        if (isset($_SESSION['notification'])){
            $sessionNotification = $_SESSION['notification'];
            $classCss = '';
            switch ($sessionNotification["type"]) {
                case NOTIFICATION_TYPE[0]:
                    $classCss = "notification-error";
                    break;
                case NOTIFICATION_TYPE[1]:
                    $classCss = "notification-info";
                    break;
            }
            echo '<div id="notification-session" class="notification '.$classCss.'"><p>' . $sessionNotification["message"] . '</p><button id="notification-session-close" class="notification-close"><i class="gg-close-o"></i></button></div>';
            unset($_SESSION['notification']);
        }
    }
}