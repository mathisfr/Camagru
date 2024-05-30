<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    header('Content-Type: application/json; charset=utf-8');
}
require_once (__DIR__ . "/../models/pictures.php");
require_once (__DIR__ . "/../models/users.php");
require_once(__DIR__ . "/../tools/Notification.php");
require_once(__DIR__ . "/../tools/Utils.php");
require_once(__DIR__ . "/../tools/User.php");
function pictureGetCommentsAjax($id){
    $picturesSQL = new Pictures();
    $users = new Users();
    $comments[] = null;
    foreach($picturesSQL->getComments($id) as $comment){
        $username = $users->getUsername($comment['user_id']);
        $comments[] = [
            'user_id' => $comment['user_id'],
            'picture_id' => $comment['picture_id'],
            'comment' => $comment['comment'],
            'username' => $username
        ];
    }
    echo json_encode($comments);
}