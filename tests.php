<?php 

// INFO: session handling, if not admin, gets redirected to index
session_start();

if (!isset($_SESSION["userEmail"]) || $_SESSION["roleId"] !== 1) {
  header("location: index.php");
}

include("classes/class.dbh.php");
include("classes/class.test.php");
include("classes/class.controller.test.php");

// INFO: getting all tests made by logged in user
$testController = TestController::constructWithOwnerOnly($_SESSION["userEmail"]);
$tests = $testController->getAllTestsByOwner();

include("includes/header.php");

?>
<link rel="stylesheet" href="css/tests.css">

<h1>Saját tesztek kezelése</h1>
<div class="container-fluid">
  <?php foreach ($tests as $test) { ?>
    <a class="test-container" href="/add_test.php?test=<?php echo $test["tid"] ?>" class="col">
      <div class="row">
      <div class="test-row row">
        <p class="test-name col"><?php echo $test["t_name"] ?></p>
        <p class="test-date description col"><?php echo $test["date"] ?></p>
      </div>
    </div>
    </a>
  <?php } ?>
</div>

<?php include("includes/footer.php"); ?>