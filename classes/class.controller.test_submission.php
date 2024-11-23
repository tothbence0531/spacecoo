<?php 

class TestSubmissionController extends TestSubmission {

  private $owner;
  private $testId;
  private $score;

  public function __construct($owner, $testId, $score) {
    $this->owner = $owner;
    $this->testId = $testId;
    $this->score = $score;
  }

  /**
   * Default constructor with option to pass nothing
   * NOTE: to call use TestController::constructDefault(params)
   */
  public static function constructDefault() {
    $instance = new self(null, null, null);
    
    return $instance;
  }

  public function submitTest($questions, $responses) {
    $this->setTestSubmission($this->owner, $this->testId, $this->score, $questions, $responses);
  }

  public function testSubmittedByUser($userEmail, $testId) {
    return count($this->getSubmissionsByUserAndTest($userEmail, $testId)) > 0;
  }

  public function getSubmissionsByUserAndTestId($userEmail, $testId) {
    return $this->getSubmissionsByUserAndTest($userEmail, $testId);
  }
  
}