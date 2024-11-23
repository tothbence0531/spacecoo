<?php

class TestSubmission extends Dbh {

  protected function setTestSubmission($owner, $testId, $score) {
    $stmt = $this->connect()->prepare("INSERT INTO `test_submission` (`owner`, `tid`, `score`) VALUES (?, ?, ?)");

    if(!$stmt->execute(array($owner, $testId, $score))) {
      $stmt = NULL;
      header("location: ../index.php?error=stmtfailed");
      exit();
    }
  }

}