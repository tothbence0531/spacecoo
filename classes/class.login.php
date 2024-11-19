<?php

class Login extends Dbh {

    protected function getUser($email, $password) {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ?;');

        if(!$stmt->execute(array($email))) {
            $stmt = NULL;
            header('location: ../index.php?error=stmtfailed');
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = NULL;
            header('location: ../index.php?error=wrongcredentials');
            exit();
        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $passwordMatches = password_verify($password, $result[0]["password"]);
        
        if($passwordMatches !== true) {
            $stmt = NULL;
            header('location: ../index.php?error=wrongcredentials');
            exit();
        } else {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ? AND `password` = ?;');

            if(!$stmt->execute(array($email, $result[0]["password"]))) {
                $stmt = NULL;
                header('location: ../index.php?error=stmtfailed');
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = NULL;
                header('location: ../index.php?error=wrongcredentials');
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userEmail"] = $user[0]["email"];
            $_SESSION["userName"] = $user[0]["name"];
            $_SESSION["roleId"] = $user[0]["role_id"];
            $_SESSION["userPassword"] = $user[0]["password"];

            $stmt = NULL;
            $stmt = $this->connect()->prepare('UPDATE users SET is_logged_in = 1 WHERE email = ?;');

            if(!$stmt->execute(array($email))) {
                $stmt = NULL;
                header('location: ../index.php?error=stmtfailed');
                exit();
            }

            return $stmt->rowCount() > 0;
        }

        $stmt = NULL;
    }

}