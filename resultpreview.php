<?php 

// INFO: session handling, if not user, gets redirected to index
session_start();

if (!isset($_SESSION["userEmail"])) {
  header("location: index.php?error=unauthorized");
}

include("classes/class.dbh.php");

include("classes/class.test_submission.php");
include("classes/class.controller.test_submission.php");

include("classes/class.test.php");
include("classes/class.controller.test.php");

include("classes/class.questions.php");
include("classes/class.controller.questions.php");

include("classes/class.answers.php");
include("classes/class.controller.answers.php");

$testSubmissionsController = TestSubmissionController::constructDefault();

$testId = $testSubmissionsController->getTestId($_GET["id"]);

$testController = TestController::constructDefault();
$test = $testController->getTestById($testId);

$questionsController = QuestionsController::constructWithTestIdOnly($testId);
$questions = $questionsController->getAllQuestionsByTestId();

$questionCounter = 1;

include("includes/header.php");

?>

<link rel="stylesheet" href="css/test.css">

<h1><?php echo $test["t_name"]?> eredményei</h1>

<div>
<?php 
  foreach ($questions as $q_id => $question) {

    $answersController = new AnswersController($_GET["id"], $q_id);
    $usersAnswers = $answersController->getAnswer();

    $answers = [$question["correct_answer"]];
    
    if (count($question['wrong_answers']) > 0) {
      foreach ($question['wrong_answers'] as $wrong_answer) { 
        array_push($answers, $wrong_answer);
      }
    }
    shuffle($answers);
    ?>

    <h4><?php echo $questionCounter . ". " . $question["q_body"]; $questionCounter++; ?></h4>

        <div class="row">
          <div class="col">
            
          <label class="form-check-label test-question-label <?php 

              if("" === $usersAnswers["answer_given"] && $usersAnswers["is_correct"] ) echo "correct-background-color";
              else if("" === $usersAnswers["answer_given"] && !$usersAnswers["is_correct"] ) echo "incorrect-background-color";

              ?>">
              Nincs válasz
            </label>
          </div>
        </div>
    
      <?php for ($i = 0; $i < count($answers); $i++) { ?>
        <div class="row">
          <div class="col">
            <label class="form-check-label test-question-label <?php 

            if($answers[$i] === $usersAnswers["answer_given"] && $usersAnswers["is_correct"] ) echo "correct-background-color";
            else if($answers[$i] === $usersAnswers["answer_given"] && !$usersAnswers["is_correct"] ) echo "incorrect-background-color";

            ?>">
              <?php echo $answers[$i] ?>
            </label>
          </div>
        </div>
      <?php } ?>
  
  <?php }
  ?>
  
  </div>
<?php include("includes/footer.php"); ?>