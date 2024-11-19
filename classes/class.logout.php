<?php

class Logout extends Dbh {

    protected function setStatus($email) {
        $stmt = $this->connect()->prepare('UPDATE users SET is_logged_in = 0 WHERE email = ?;');

        if(!$stmt->execute(array($email))) {
            $stmt = NULL;
            header('location: ../index.php?error=stmtfailed');
            exit();
        }
    }

}

