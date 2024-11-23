<?php 

// INFO: session handling, if not admin, gets redirected to index
session_start();

if (!isset($_POST["open-test"]) || !isset($_SESSION["userEmail"])) {
  header("location: index.php?unauthorized");
}

include("classes/class.dbh.php");
include("classes/class.test.php");
include("classes/class.controller.test.php");

include("classes/class.questions.php");
include("classes/class.controller.questions.php");

$testController = TestController::constructDefault();
$test = $testController->getTestById($_POST["testid"]);

$questionsController = QuestionsController::constructWithTestIdOnly($_POST["testid"]);
$questions = $questionsController->getAllQuestionsByTestId();

$questionCounter = 1;

include("includes/header.php");

?>

<link rel="stylesheet" href="css/test.css">

<h1><?php echo $test["t_name"]?> kitöltése</h1>

<form action="includes/include.test_submission.php" method="post">
<?php 
  foreach ($questions as $q_id => $question) {

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
            
            <label class="form-check-label test-question-label" for="question_<?php echo $q_id ?> answer_default">
              <input type="radio" class="form-check-input" name="question_<?php echo $q_id ?>" id="question_<?php echo $q_id ?> answer_default" value="" required checked>
              Nincs válaszs
            </label>
          </div>
        </div>
    
      <?php for ($i = 0; $i < count($answers); $i++) { ?>
        <div class="row">
          <div class="col">
            <label class="form-check-label test-question-label" for="question_<?php echo $q_id ?> answer_<?php echo $i ?>">
              <input type="radio" class="form-check-input" name="question_<?php echo $q_id ?>" id="question_<?php echo $q_id ?> answer_<?php echo $i ?>" value="<?php echo htmlspecialchars($answers[$i]); ?>" required>
              <?php echo $answers[$i] ?>
            </label>
          </div>
        </div>
      <?php } ?>
  
  <?php }
  ?>
  <input type="hidden" name="tid" value="<?php echo $test["tid"] ?>">
  <input type="submit" class="mt-4 btn btn-primary" value="Beadás" name="submit_test">
</form>
  

<?php include("includes/footer.php"); ?>