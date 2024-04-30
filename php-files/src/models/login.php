<?php
    require_once(__DIR__."/../tools/DatabaseConnection.php");
    class Login {
        private DatabaseConnection $db;
        function __construct(){
            $this->db = new DatabaseConnection();
        }
        public function identify(string $username, string $password, string &$email): bool{
            $request = $this->db->getConnection()->prepare('SELECT * FROM users WHERE username=:username');
            $request->bindParam(':username', $username, PDO::PARAM_STR);
            $request->execute();
            $data = $request->fetch(PDO::FETCH_ASSOC);
            if ($request->rowCount() != 1){
                return false;
            }
            if (!password_verify($password, $data["pass"])){
                return false;
            }
            $email = $data["email"];
            $request->closeCursor();
            return true;
        }
    }
?>