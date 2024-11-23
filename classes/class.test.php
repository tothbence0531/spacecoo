<?php

class Test extends Dbh {

  protected function getCustomAmountOfTests($amount) {
    $stmt = $this->connect()->prepare("SELECT * FROM `tests` ORDER BY `tid` DESC LIMIT $amount");

    if (!$stmt->execute()) {
      $stmt = NULL;
      header('location: ../index.php?error=stmtfailed');
      exit();
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  protected function getAllTests() {
    $stmt = $this->connect()->prepare('SELECT * FROM tests');

    if (!$stmt->execute()) {
      $stmt = NULL;
      header('location: ../index.php?error=stmtfailed');
      exit();
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  protected function getAllTestsByOwnerId($testOwner) {
    $stmt = $this->connect()->prepare('SELECT * FROM tests WHERE `owner` = ?');

    if (!$stmt->execute(array($testOwner))) {
      $stmt = NULL;
      header('location: ../index.php?error=stmtfailed');
      exit();
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  protected function addTest($testName, $testMinScore, $testOwner) {

    $conn = $this->connect();

    $stmt = $conn->prepare('SELECT * FROM users WHERE email = ?;');

    if(!$stmt->execute(array($testOwner))) {
        $stmt = NULL;
        header('location: ../index.php?error=stmtfailed');
        exit();
    }

    if($stmt->rowCount() == 0) {
      header('location: ../index.php?error=stmtfailed');
      exit();
    }

    $stmt = $conn->prepare('INSERT INTO `tests`(`t_name`, `date`, `min_score`, `owner`) VALUES (?,CURRENT_DATE,?,?);');

    if(!$stmt->execute(array($testName, $testMinScore, $testOwner))) {
        $stmt = NULL;
        header('location: ../index.php?error=stmtfailed');
        exit();
    }

    $testId = $conn->lastInsertId();
    return $testId;
    
  }

  public function getTestById($testId) {
    $stmt = $this->connect()->prepare('SELECT * FROM tests WHERE tid = ?');

    if (!$stmt->execute(array($testId))) {
      $stmt = NULL;
      header('location: ../index.php?error=stmtfailed');
      exit();
    }

    if($stmt->rowCount() == 0) {
      header('location: ../index.php?error=stmtfailed');
      exit();
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];

  }
}