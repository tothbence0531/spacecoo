<?php 

class Answers extends Dbh {
  protected function getAnswerBySubmissionAndQuestionId($sub_id, $q_id) {

    $stmt = $this->connect()->prepare("SELECT * FROM `answers` WHERE `submission_id` = ? AND `q_id` = ?");
    
    if(!$stmt->execute(array($sub_id, $q_id)) || $stmt->rowCount() == 0) {
      $stmt = NULL;
      header("location: index.php?stmtfailed");
      exit();
    }

    $answer = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $answer[0];

  }
}