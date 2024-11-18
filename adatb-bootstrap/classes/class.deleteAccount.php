<?php

class DeleteAccount extends Dbh {
  private $email;

  public function __construct($email) {
    $this->email = $email;
  }

  public function deleteUserAccount() {
    $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ?;");
    
    if (!$stmt->execute(array($this->email))) {
      $stmt = NULL;
      header('location: ../profile.php?error=stmtfailed');
      exit();
    }

    if ($stmt->rowCount() == 0) {
      $stmt = NULL;
      header('location: ../profile.php?error=stmtfailed');
      exit();
    }

    $stmt = $this->connect()->prepare("DELETE FROM users WHERE email = ?;");
    
    if (!$stmt->execute(array($this->email))) {
      $stmt = NULL;
      header('location: ../profile.php?error=stmtfailed');
      exit();
    }

  }

}