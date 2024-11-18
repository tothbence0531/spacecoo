<?php

class Signup extends Dbh {

    protected function getRoleId($role) {
        $stmt = $this->connect()->prepare('SELECT * FROM role WHERE role_name = ?;');

        if(!$stmt->execute(array($role))) {
            $stmt = NULL;
            header('location: ../signup.php?error=stmtfailed');
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = NULL;
            header('location: ../signup.php?error=rolenotfound');
            echo $role;
            exit();
        }

        $resultRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $stmt = NULL;

        return $resultRow[0]["role_id"];
    }

    protected function setUser($fullName, $email, $role, $password) {
        $stmt = $this->connect()->prepare('INSERT INTO users (email, name, password, role_id, is_logged_in) VALUES (?, ?, ?, ?, ?)');

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($email, $fullName, $hashedPassword, $this->getRoleId($role), false))) {
            $stmt = NULL;
            header('location: ../signup.php?error=stmtfailed');
            exit();
        }

        if($stmt->rowCount() > 0) {
            return true;
        } else return false;
    }

    protected function emailTaken($email) {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ?;');

        if(!$stmt->execute(array($email))) {
            $stmt = NULL;
            header('location: ../signup.php?error=stmtfailed');
            exit();
        }

        if($stmt->rowCount() > 0) {
            return true;
        } else return false;
    }
    
}