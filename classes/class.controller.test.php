<?php

class TestController extends Test {
  private $testName;
  private $testMinScore;
  private $testOwner;
  private $limitAmount;

  public function __construct($testName, $testMinScore, $testOwner) {
    $this->testName = $testName;
    $this->testMinScore = $testMinScore;
    $this->testOwner = $testOwner;
    $this->limitAmount = null;
  }

  /**
   * Second constructor with option to pass only testOwner and nothing else
   * NOTE: to call use TestController::constructWithOwnerOnly(params)
   */
  public static function constructWithOwnerOnly($testOwner) {
    $instance = new self(null, null, $testOwner);
    
    return $instance;
  }

  /**
   * Default constructor with option to pass nothing
   * NOTE: to call use TestController::constructDefault(params)
   */
  public static function constructDefault() {
    $instance = new self(null, null, null);
    
    return $instance;
  }

  /**
   * Default constructor with option to pass a limit for listing x amount of tests
   * NOTE: to call use TestController::constructWithLimit(params)
   */
  public static function constructWithLimit($amount) {
    $instance = new self(null, null, null);
    $instance->limitAmount = $amount;
    return $instance;
  }
  
  public function addTestWithoutQuestions() {
    return $this->addTest($this->testName, $this->testMinScore, $this->testOwner);
  }

  public function getAllTestsByOwner() {
    return $this->getAllTestsByOwnerId($this->testOwner);
  }

  public function getLimitedAmountOfTests() {
    return $this->getCustomAmountOfTests($this->limitAmount);
  }

  public function getAllTests() {
    return $this->getTests();
  }
 
}