<?php

class Test extends Dbh {

  protected function getCustomAmountOfTests($amount) {
    $stmt = $this->connect()->prepare("SELECT * FROM `tests` ORDER BY `tid` DESC LIMIT $amount");

    if (!$stmt->execute()) {
      $stmt = NULL;
      header('location: index.php?error=stmtfailed');
      exit();
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  protected function getCustomAmountOfTestsOrderedBySubmissions($amount) {
    $sql = "SELECT t.tid, t.t_name, t.date, t.min_score, t.owner, COUNT(ts.tid) AS submission_count FROM  tests t JOIN  test_submission ts ON t.tid = ts.tid GROUP BY  t.tid, t.t_name, t.date, t.min_score, t.owner ORDER BY submission_count DESC LIMIT $amount;";
    
    $stmt = $this->connect()->prepare($sql);

    if (!$stmt->execute()) {
      $stmt = NULL;
      header('location: index.php?error=stmtfailed');
      exit();
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  protected function getTests() {
    $stmt = $this->connect()->prepare('SELECT * FROM tests');

    if (!$stmt->execute()) {
      $stmt = NULL;
      header('location: index.php?error=stmtfailed');
      exit();
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  protected function getAllTestsByOwnerId($testOwner) {
    $stmt = $this->connect()->prepare('SELECT * FROM tests WHERE `owner` = ?');

    if (!$stmt->execute(array($testOwner))) {
      $stmt = NULL;
      header('location: index.php?error=stmtfailed');
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
        header('location: index.php?error=stmtfailed');
        exit();
    }

    if($stmt->rowCount() == 0) {
      header('location: index.php?error=stmtfailed');
      exit();
    }

    $stmt = $conn->prepare('INSERT INTO `tests`(`t_name`, `date`, `min_score`, `owner`) VALUES (?,CURRENT_DATE,?,?);');

    if(!$stmt->execute(array($testName, $testMinScore, $testOwner))) {
        $stmt = NULL;
        header('location: index.php?error=stmtfailed');
        exit();
    }

    $testId = $conn->lastInsertId();
    return $testId;
    
  }

  public function getTestById($testId) {
    $stmt = $this->connect()->prepare('SELECT * FROM tests WHERE tid = ?');

    if (!$stmt->execute(array($testId))) {
      $stmt = NULL;
      header('location: index.php?error=stmtfailed');
      exit();
    }

    if($stmt->rowCount() == 0) {
      header('location: index.php?error=stmtfailed');
      exit();
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];

  }

  public function getTestsLikeParam($input) {

    $stmt = $this->connect()->prepare("SELECT * FROM tests WHERE t_name LIKE CONCAT('%', ?, '%');");

    if (!$stmt->execute(array($input))) {
      $stmt = NULL;
      header('location: index.php?error=stmtfailed');
      exit();
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;

  }

  public function getBestPerformedOnTests($amount) {
    $sql = "SELECT 
                t.t_name AS t_name,
                COUNT(ts.owner) AS submission_count,
                ROUND(AVG(ts.score), 2) AS avg_points
            FROM 
                tests t
            JOIN 
                test_submission ts ON t.tid = ts.tid
            GROUP BY 
                t.t_name
            ORDER BY 
                avg_points DESC
            LIMIT $amount;";

    $stmt = $this->connect()->prepare($sql);

    if (!$stmt->execute(array())) {
      $stmt = NULL;
      header('location: index.php?error=stmtfailed');
      exit();
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }
}