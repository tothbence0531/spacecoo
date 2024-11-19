<?php

class TestController extends Test {
  private $testName;
  private $testMinScore;
  private $questionList;
  private $testOwner;

  public function __construct($testName, $testMinScore, $testOwner) {
    $this->testName = $testName;
    $this->testMinScore = $testMinScore;
    $this->testOwner = $testOwner;
    $this->questionList = [];
  }

  /**
   * Second constructor with option to pass questions in an array straight into the instance
   * NOTE: to call use TestController::withQuestions(params)
   */
  public static function withQuestions($testName, $testMinScore, $testOwner, $questionArray) {
    $instance = new self($testName, $testMinScore, $testOwner);
    $instance->questionList = $questionArray;
    
    return $instance;
  }
  
  public function addTestWithoutQuestions() {
    return $this->addTest($this->testName, $this->testMinScore, $this->testOwner);
  }
}