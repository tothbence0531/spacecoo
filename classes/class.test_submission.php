<?php

class TestSubmission extends Dbh {

  /**
   * This function sends test submission data to the database
   *
   * Expects 2 external params outside of the controller, both are arrays from it extracts the responses and sends the data to the answers table this way tracking the answers the user has given to each question of the test
   *
   * @param string $owner owner (email) of the submission 
   * @param int $testId id of the test which the user has submitted
   * @param int $score score on the test
   * @param array $questions associative array of all the questions linked to the test submitted
   * get specific question via q_id ex. $questions["q_id"] == row of the question from the database;
   * @param array $responses associative array of all the responses linked to the questions
   * get specific question via q_id ex. $responses["q_id"] == "a string of the answer";
   **/
  protected function setTestSubmission($owner, $testId, $score, $questions, $responses) {
    try{

      $conn = $this->connect();
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $conn->beginTransaction();
    
      $stmt = $conn->prepare("INSERT INTO `test_submission` (`owner`, `tid`, `score`) VALUES (?, ?, ?)");
      $stmt->execute(array($owner, $testId, $score));
      $sub_id = $conn->lastInsertId();

      foreach ($responses as $q_id => $answer) {
        $stmt = $conn->prepare("INSERT INTO `answers` (`submission_id`, `answer_given`, `is_correct`, `Users_email`, `q_id`) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(array($sub_id, $answer, $answer === $questions[$q_id]["correct_answer"], $owner, $q_id));
      }

      $conn->commit();

  } catch (Exception $e) {
    $conn->rollBack();
    header("location: ../index.php?error=stmtfailed");
    exit();
  }

  }

}