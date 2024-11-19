<?php

session_start();

if (isset($_POST["add-test-submit"])) {
  $testName = $_POST["test-name"];
  $testMinScore = $_POST["test-min"];
  $owner = $_POST["userEmail"];

  include('../classes/class.dbh.php');
  include('../classes/class.test.php');
  include('../classes/class.controller.test.php');

  $testController = new TestController($testName, $testMinScore, $owner);

  $testId = $testController->addTestWithoutQuestions();

  header("location: ../add_test.php?test=" . $testId);
}
