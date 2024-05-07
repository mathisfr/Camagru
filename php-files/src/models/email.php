<?php
    require_once(__DIR__."/../tools/DatabaseConnection.php");

    class Email extends DatabaseConnection{
        public function confirmation(string $userKey){
            $request = $this->getConnection()->prepare('SELECT `user_id`, `user_key` FROM `keyMail` WHERE user_key=:userKey');
            $request->bindParam(':userKey', $userKey, PDO::PARAM_STR);
            $request->execute();
            if ($request->rowCount() > 0){
                $data = $request->fetch(PDO::FETCH_ASSOC);
                $userId = $data['user_id'];
                $request->closeCursor();
                $request = $this->getConnection()->prepare('UPDATE `users` SET `emailVerified`=TRUE WHERE `id`=:userId');
                $request->bindParam(':userId', $userId, PDO::PARAM_INT);
                $request->execute();
                $request->closeCursor();
                $request = $this->getConnection()->prepare('DELETE FROM `keyMail` WHERE `user_id`=:userId');
                $request->bindParam(':userId', $userId, PDO::PARAM_INT);
                $request->execute();
            }else{
                $request->closeCursor();
                return false;
            }
            $request->closeCursor();
            return true;
        }
        public function insertKeyRegistration(int $userId, string $userKey): bool{
            $request = $this->getConnection()->prepare('INSERT INTO `keyMail`(`user_id`, `user_key`) VALUES (:userId, :userKey)');
            $request->bindParam(':userId', $userId, PDO::PARAM_INT);
            $request->bindParam(':userKey', $userKey, PDO::PARAM_STR);
            $request->execute();
            $request->closeCursor();
            return true;
        }

        static public function sendMail(string $email, int $id): bool
        {
            $emailSQL = new Email();
            $key = bin2hex(random_bytes(50));
            $emailSQL->insertKeyRegistration($id, $key);
            $to = $email;
            $subject = 'Confirmation de votre inscription';
            $headers = "From: info@camagru.42.fr\r\n";
            $headers .= "Reply-To: " . $email . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $message = '<html>
                    <body>
                        <div>
                            <h1>Confirmation de votre inscription</h1>
                            <p>Vous venez de vous inscrire sur notre site.</p>
                            <p>Pour valider votre inscription, veuillez cliquer sur le lien suivant : <a href="http://localhost:8080/router.php?page=userConfirmMail&key='. $key .'">Confirmer mon inscription</a></p>
                        </div>
                    </body>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            display: flex;
                            flex-direction: column;
                            justify-content: center;
                            align-items: center;
                            background-image: linear-gradient( 135deg, var(--yellow) 10%, var(--rose) 100%);
                            height: 100%;
                        }
                        h1 {
                            color: #2c2c2c;
                        }
                        p {
                            color: #2c2c2c;
                        }
                        div{
                            box-shadow: 0 0 50px var(--white-shadow);
                            background-color: white;
                            box-sizing: border-box;
                            display: flex;
                            flex-direction: column;
                            width: 35vw;
                            min-width: 300px;
                        }
                    </style>
                </html>';
            return mail($to, $subject, $message, $headers);
        }
    }