<?php

if (isset($_POST["add-question-submit"])) {

  $testId = $_POST["t_id"];
  $questionBody = $_POST["question-text"];
  $correctAnswer = $_POST["correct-answer"];
  $wrongAnswers = [];

  for ($i=1; $i <= 5; $i++) { 
    if (!empty($_POST["incorrect-answer" . $i])) {
      array_push($wrongAnswers, $_POST["incorrect-answer" . $i]);
    }
  }

  include('../classes/class.dbh.php');
  include('../classes/class.questions.php');
  include('../classes/class.controller.questions.php');

  $questionsController = new QuestionsController($questionBody, $correctAnswer, $wrongAnswers, $testId);
  $questionsController->addQuestion();

  header("location: ../add_test.php?test=" . $testId);

}