<?php

class Questions extends Dbh {

  protected function setQuestion($questionBody, $correctAnswer, $wrongAnswers, $testId) {

    try {

      $conn = $this->connect();
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $conn->beginTransaction();

      $stmt = $conn->prepare("INSERT INTO questions (q_body, correct_answer) VALUES (?, ?)");
      $stmt->execute(array($questionBody, $correctAnswer));
      $q_id = $conn->lastInsertId();

      $w_ids = [];
      $stmt = $conn->prepare("INSERT INTO wrong_answers (wrong_answer) VALUES (?)");
      foreach ($wrongAnswers as $wrongAnswer) {
        $stmt->execute(array($wrongAnswer));
        array_push($w_ids, $conn->lastInsertId());
      }

      $stmt = $conn->prepare("INSERT INTO question_wrong_answers (q_id, w_id) VALUES (?, ?)");
      foreach ($w_ids as $w_id) {
        $stmt->execute(array($q_id, $w_id));
      }

      $stmt = $conn->prepare("INSERT INTO test_questions (tid, q_id) VALUES (?, ?)");
      $stmt->execute(array($testId, $q_id));

      $conn->commit();

    } catch(Exception $e) {

      $conn->rollBack();
      header("location: ../index.php?stmtfailed");

    }

  }

  protected function getQuestions($testId) {
    try {
      $sql = "
      SELECT 
          q.q_id,
          q.q_body,
          q.correct_answer,
          wa.wrong_answer
      FROM 
          tests t
      JOIN 
          test_questions tq ON t.tid = tq.tid
      JOIN 
          questions q ON tq.q_id = q.q_id
      LEFT JOIN 
          question_wrong_answers qwa ON q.q_id = qwa.q_id
      LEFT JOIN 
          wrong_answers wa ON qwa.w_id = wa.w_id
      WHERE 
          t.tid = ?
      ";

      $conn = $this->connect();
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare($sql);
      $stmt->execute(array($testId));

      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $results;

    } catch (Exception $e) {
      header("location: ../index.php?stmtfailed");
      exit();
    }
    
  }

}