<?php 

if (isset($_POST["submit_test"])) {

  session_start();
  
  include("../classes/class.dbh.php");
  include("../classes/class.questions.php");
  include("../classes/class.controller.questions.php");

  include("../classes/class.test_submission.php");
  include("../classes/class.controller.test_submission.php");
  

  $questionsController = QuestionsController::constructWithTestIdOnly($_POST["tid"]);
  $questions = $questionsController->getAllQuestionsByTestId();

  $responses = [];
  $score = 0;

  foreach ($_POST as $key => $value) {
    if (strpos($key, 'question_') === 0) {
      $question_id = str_replace('question_', '', $key);
      $responses[$question_id] = $value;
    }
  }

  foreach ($responses as $q_id => $answer) {
    if ($questions[$q_id]['correct_answer'] === $answer) {
        $score++;
    }
  }

  $testSubmissionController = new TestSubmissionController($_SESSION["userEmail"], $_POST["tid"], $score);
  $testSubmissionController->submitTest();

  header("location: ../index.php?error=none");

}