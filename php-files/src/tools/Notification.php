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
            switch ($sessionNotification["type"]) {
                case NOTIFICATION_TYPE[0]:
                    echo '<div class="notification notification-error">' . $sessionNotification["message"] . '</div>';
                    break;
                case NOTIFICATION_TYPE[1]:
                    echo '<div class="notification notification-info">' . $sessionNotification["message"] . '</div>';
                    break;
            }
            unset($_SESSION['notification']);
        }
    }
}