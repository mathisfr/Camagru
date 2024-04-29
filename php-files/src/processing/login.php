<?php
    session_start();
    
    try {
    $mysqlClient = new PDO(
        'mysql:host=mariadb;dbname=camagru;charset=UTF8;unix_socket=/var/run/mysqld/mysql.sock',
        'root',
        'root');
    }
    catch(PDOException $e){
        die('Erreur : '.$e->getMessage());
    }

    if (isset($_POST["username-login"]) && isset($_POST["password-login"])){
        $username = $_POST["username-login"];
        $password = $_POST["password-login"];
        if (empty($username) || empty($password)){
            $_SESSION["debug"] = 1;
            header("Location: ../home.php");
            exit();
        }
        else{
            $_SESSION["debug"] = 2;
            $_SESSION["loggedUser"] = [
                "username" => strip_tags($username),
            ];
            header("Location: ../showpictures.php");
            exit();
        }
    }else{
        $_SESSION["debug"] = 3;
        header("Location: ../home.php");
        exit();
    }
?>