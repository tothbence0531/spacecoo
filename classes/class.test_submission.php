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
    
      $stmt = $conn->prepare("INSERT INTO `test_submission` (`owner`, `tid`, `score`, `date`) VALUES (?, ?, ?, NOW())");
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

  protected function getSubmissionsByUserAndTest($userId, $testId) {
    $stmt = $this->connect()->prepare("SELECT * FROM `test_submission` WHERE `owner` = ? AND `tid` = ? ORDER BY score DESC");
    if (!$stmt->execute(array($userId, $testId))) {
      $stmt = NULL;
      header("location: ../index.php?stmtfailed");
      exit();
    }

    $submissions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $submissions;

  }

  protected function getTestsSubmittedByUser($userId) {
    $stmt = $this->connect()->prepare(
      "SELECT tests.tid, tests.t_name, tests.date, tests.min_score, tests.owner FROM tests JOIN  test_submission ON tests.tid = test_submission.tid WHERE test_submission.owner = ? GROUP BY tests.t_name;");

    if (!$stmt->execute(array($userId))) {
      $stmt = NULL;
      header("location: ../index.php?stmtfailed");
      exit();
    }

    $tests = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $tests;

  }

  protected function getTestIdBySubmissionId($submissionId) {
    $stmt = $this->connect()->prepare("SELECT `tid` FROM `test_submission` WHERE `sub_id` = ?");

    if(!$stmt->execute(array($submissionId))) {
      $stmt = NULL;
      header("location: ../index.php?stmtfailed");
      exit();
    }

    $testId = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $testId;

  }

  protected function getBestStudents($teacherEmail) {
    $sql = 
    "SELECT 
    u.name AS student_name,
    u.email AS student_email,
    COUNT(ts.tid) AS tests_completed,
    AVG(ts.score) AS avg_score,
    MAX(ts.score) AS best_score,
    (
        SELECT t.t_name
        FROM tests t
        INNER JOIN test_submission ts_inner ON t.tid = ts_inner.tid
        WHERE ts_inner.owner = u.email AND t.owner = ?
        ORDER BY ts_inner.date DESC
        LIMIT 1
    ) AS last_test_name,
    (
        SELECT ts_inner.score
        FROM tests t
        INNER JOIN test_submission ts_inner ON t.tid = ts_inner.tid
        WHERE ts_inner.owner = u.email AND t.owner = ?
        ORDER BY ts_inner.date DESC
        LIMIT 1
    ) AS last_test_score
    FROM 
        users u
    LEFT JOIN 
        test_submission ts ON u.email = ts.owner
    LEFT JOIN 
        tests t ON ts.tid = t.tid
    WHERE 
        t.owner = ?
    GROUP BY 
        u.email, u.name
    ORDER BY 
        avg_score DESC, tests_completed DESC;";

    $stmt = $this->connect()->prepare($sql);

    if(!$stmt->execute(array($teacherEmail, $teacherEmail, $teacherEmail))) {
      $stmt = NULL;
      header("location: ../index.php?stmtfailed");
      exit();
    }

    $testId = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $testId;

  }

}