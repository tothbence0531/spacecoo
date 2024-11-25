<?php

class OnlineUsers extends Dbh {
  protected function getOnlineUsers() {
    $stmt = $this->connect()->prepare('SELECT * FROM `users` WHERE `is_logged_in` = 1');

    if(!$stmt->execute()) {
      $stmt = NULL;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    $onlineUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $onlineUsers;
  }

  protected function getAmountOfUsers($amount) {
    $stmt = $this->connect()->prepare('SELECT * FROM `users` WHERE `is_logged_in = 1 LIMIT ?');

    if(!$stmt->execute(array($amount))) {
      $stmt = NULL;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }

    $onlineUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $onlineUsers;
  }
}