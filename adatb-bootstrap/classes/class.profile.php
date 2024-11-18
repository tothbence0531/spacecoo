<?php

class Profile extends Dbh {
  protected function setUserGeneral($fullName, $email, $oldEmail) {
    $stmt = $this->connect()->prepare('UPDATE users SET email = ?, name = ? WHERE email = ?;');

    if(!$stmt->execute(array($email, $fullName, $oldEmail))) {
        $stmt = NULL;
        header('location: ../profile.php?error=stmtfailed');
        exit();
    }

    if($stmt->rowCount() == 0) {
      $stmt = NULL;
      header('location: ../index.php?error=wrongcredentials');
      exit();
    }

    $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ?');

    if(!$stmt->execute(array($email))) {
      $stmt = NULL;
      header('location: ../profile.php?error=stmtfailed');
      exit();
    }

    if($stmt->rowCount() == 0) {
      $stmt = NULL;
      header('location: ../index.php?error=wrongcredentials');
      exit();
    }

    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION["userEmail"] = $user[0]["email"];
    $_SESSION["userName"] = $user[0]["name"];

    if($stmt->rowCount() > 0) {
        return true;
    } else return false;
}

protected function emailTaken($email, $oldEmail) {
  $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ?;');

  if(!$stmt->execute(array($email))) {
      $stmt = NULL;
      header('location: ../profile.php?error=stmtfailed');
      exit();
  }

  if($stmt->rowCount() > 0) {
      $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if ($user[0]["email"] == $oldEmail) return false;
      else return true;
  } else return false;
}

protected function setUserPassword($password, $email) {
  $stmt = $this->connect()->prepare('UPDATE users SET password = ? WHERE email = ?');

  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  if(!$stmt->execute(array($hashedPassword, $email))) {
      $stmt = NULL;
      header('location: ../profile.php?error=stmtfailed');
      exit();
  }

  $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $_SESSION["userPassword"] = $user[0]["password"];

  if($stmt->rowCount() > 0) {
      return true;
  } else return false;
}

protected function invalidCurrentPassword($password, $email) {
  $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ?;');

  if(!$stmt->execute(array($email))) {
      $stmt = NULL;
      header('location: ../profile.php?error=stmtfailed');
      exit();
  }

  if($stmt->rowCount() == 0) {
      $stmt = NULL;
      header('location: ../profile.php?error=wrongcredentials');
      exit();
  }

  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt = NULL;

  if (password_verify($password, $result[0]["password"])) {
    return false;
  } return true;
}

}