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
   * Second constructor with option to pass only testOwner and nothing else
   * NOTE: to call use TestController::constructWithOwnerOnly(params)
   */
  public static function constructWithOwnerOnly($testOwner) {
    $instance = new self(null, null, $testOwner);
    
    return $instance;
  }
  
  public function addTestWithoutQuestions() {
    return $this->addTest($this->testName, $this->testMinScore, $this->testOwner);
  }

  public function getAllTestsByOwner() {
    return $this->getAllTests($this->testOwner);
  }
}