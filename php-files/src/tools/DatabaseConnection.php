<?php
class DatabaseConnection
{
    private ?PDO $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                'mysql:host=mariadb;dbname=camagru;charset=UTF8;unix_socket=/var/run/mysqld/mysql.sock',
                'root',
                'root');
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                die('Erreur : '.$e->getMessage());
            }
    }

    public function getConnection() : PDO
    {
        return $this->connection;
    }
}