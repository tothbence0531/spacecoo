<?php

class DeleteAccount extends Dbh {
  protected function unsetUser($userEmail) {
    $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ?;");
    
    if (!$stmt->execute(array($userEmail))) {
      $stmt = NULL;
      header('location: profile.php?error=stmtfailed');
      exit();
    }

    if ($stmt->rowCount() == 0) {
      $stmt = NULL;
      header('location: profile.php?error=stmtfailed');
      exit();
    }

    $stmt = $this->connect()->prepare("DELETE FROM users WHERE email = ?;");
    
    if (!$stmt->execute(array($userEmail))) {
      $stmt = NULL;
      header('location: profile.php?error=stmtfailed');
      exit();
    }

  }

}