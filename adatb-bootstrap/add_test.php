<?php 
session_start();

if (!isset($_SESSION["userEmail"]) || $_SESSION["roleId"] !== 1 || !isset($_GET["test"])) {
  header("location: index.php");
}

include('classes/class.dbh.php');
include('classes/class.test.php');

$testDAO = new Test();
$test = $testDAO->getTestById($_GET["test"])[0];

include('includes/header.php');

?>

<div class="modal fade" id="addQuestionModal" tabindex="-1" aria-labelledby="addQuestionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-m modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
          <h1 class="modal-title fs-5" id="addQuestionModalLabel">Kérdés hozzáadása</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="includes/include.test.php" method="post">
          <div class="modal-body">
              <div class="container">
                  <div class="row">
                      <div class="col">
                          <label for="test-name">Teszt neve:</label>
                          <input name="test-name" id="test-name" type="text" class="form-control">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col">
                          <label for="test-min">Minimális pontszám: </label>
                          <input name="test-min" id="test-min" type="number" class="form-control">
                      </div>
                  </div>
              </div>

          </div>
          <div class="modal-footer">
              <input type="hidden" name="userEmail" value="<?php echo $_SESSION["userEmail"] ?>">
              <input name="add-test-submit" class="btn btn-primary" type="submit" value="Hozzáadás">
          </div>
      </form>
    </div>
  </div>
</div>

<h1>Teszt hozzáadása</h1>


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

  <div class="row mt-5">
    <p>Még nincsenek kérdések</p>
  </div>

  <div class="row mt-5">
    <a href="#" data-bs-toggle="modal" data-bs-target="#addQuestionModal" class="btn btn-primary"></a>
  </div>


<?php include('includes/footer.php') ?>