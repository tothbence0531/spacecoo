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

  public function submitTest() {
    $this->setTestSubmission($this->owner, $this->testId, $this->score);
  }
  
}