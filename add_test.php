<?php 
// INFO: session handling, if not admin, gets redirected to index
session_start();

if (!isset($_SESSION["userEmail"]) || $_SESSION["roleId"] !== 1) {
  header("location: index.php?error=unauthorized");
  exit();
}

if (!isset($_GET["test"])) {
  header("location: index.php?error=missingparams");
  exit();
}

// INFO: handling test variables to display
// TODO: add editing to this
include('classes/class.dbh.php');
include('classes/class.test.php');

$testDAO = new Test();
$test = $testDAO->getTestById($_GET["test"]);

// INFO: getting questions to display
include('classes/class.questions.php');
include('classes/class.controller.questions.php');

$questionsController = QuestionsController::constructWithTestIdOnly($_GET["test"]);
$questions = $questionsController->getAllQuestionsByTestId();

include('includes/header.php');

?>

<div class="modal fade" id="addQuestionModal" tabindex="-1" aria-labelledby="addQuestionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
          <h1 class="modal-title fs-5" id="addQuestionModalLabel">Kérdés hozzáadása</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="includes/include.question.php" method="post">
          <div class="modal-body">
              <div class="container">

                  <div class="row">
                    
                      <div class="col">
                        <label for="question-text" class="form-label">Kérdés szövege: *</label>
                        <textarea class="form-control" id="question-text" name="question-text" rows="3" required placeholder="Ez egy példa kérdés?"></textarea>
                      </div>

                  </div>

                  <div class="row mt-3">

                    <div class="col">
                        <label for="correct-answer" class="correct-color form-label">Helyes válasz: *</label>
                        <input name="correct-answer" id="correct-answer" type="text" class="form-control" placeholder="Igen" required>
                    </div>

                  </div>

                  <div class="row mt-3">

                    <div class="col">
                      <label for="incorrect-answer1" class="incorrect-color form-label">Helytelen válasz: *</label>
                      <input name="incorrect-answer1" id="incorrect-answer1" type="text" class="form-control" placeholder="Nem" required>
                    </div>

                    <div class="col">
                      <label for="incorrect-answer2" class="incorrect-color form-label">Helytelen válasz: </label>
                      <input name="incorrect-answer2" id="incorrect-answer2" type="text" class="form-control" placeholder="Nem">
                    </div>

                    <div class="col">
                      <label for="incorrect-answer3" class="incorrect-color form-label">Helytelen válasz: </label>
                      <input name="incorrect-answer3" id="incorrect-answer3" type="text" class="form-control" placeholder="Nem">
                    </div>

                    <div class="col">
                      <label for="incorrect-answer4" class="incorrect-color form-label">Helytelen válasz: </label>
                      <input name="incorrect-answer4" id="incorrect-answer4" type="text" class="form-control" placeholder="Nem">
                    </div>

                  </div>

                  <div class="row">
                    <div class="col">
                      <p class="description mt-4">*Egy új kérdés sikeres hozzáadásához kötelező megadni a kérdés szövegét, a <span class="correct-color">helyes</span> választ, valamint legalább egy <span class="incorrect-color">helytelen válasz</span>t. Ha csak egy <span class="incorrect-color">helytelen válasz</span> kerül megadásra, azt az első beviteli mezőbe kell írni. Az üresen hagyott <span class="incorrect-color">helytelen válasz</span> mezőket a rendszer figyelmen kívül hagyja.</p>
                    </div>
                  </div>

              </div>
            </div>

        <div class="modal-footer">
          <input type="hidden" name="t_id" value="<?php echo $_GET["test"] ?>">
          <input name="add-question-submit" class="btn btn-primary" type="submit" value="Hozzáadás">
        </div>
      </form>
    </div>
  </div>
</div>

<h1>Teszt szerkesztése</h1>

  <div class="row">
    <div class="col">
      <label class="form-label" for="disabled-test-name">Teszt neve:</label>
      <input id="disabled-test-name" class="form-control" type="text" placeholder="<?php echo $test['t_name'] ?>" disabled>
    </div>
    <div class="col">
      <label class="form-label" for="disabled-test-min">Minimális pontszám:</label>
      <input id="disabled-test-min" class="form-control" type="number" placeholder="<?php echo $test['min_score'] ?>" disabled>
    </div>
  </div>

<h1 class="mt-4">Kérdések:</h1>

<?php if (empty($questions)) { ?>
  <div class="row mt-3">
    <p class="description">Még nincsenek kérdések</p>
  </div>
<?php } else {?>

<div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 mt-2">
  <?php foreach ($questions as $q_id => $question) { ?>
    <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?php echo $question["q_body"] ?></h5>
        <p class="correct-color card-text"><?php echo $question['correct_answer'] ?></p>
      

    <?php if (count($question['wrong_answers']) > 0) {
        foreach ($question['wrong_answers'] as $wrong_answer) { ?>
            <p class="incorrect-color card-text"><?php echo $wrong_answer ?></p>
        <?php }
       } ?>
       </div>
        </div>
       </div>
      <?php } ?>
</div>

<?php } ?>

  <div class="row">
    <div class="col">
      <a href="#" data-bs-toggle="modal" data-bs-target="#addQuestionModal" class="btn btn-primary">Kérdés hozzáadása</a>
    </div>
  </div>


<?php include('includes/footer.php') ?>