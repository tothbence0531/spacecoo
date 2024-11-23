<?php 

session_start();

if (!isset($_SESSION["userEmail"])) {
    header("location: index.php");
}

include('classes/class.dbh.php');
include('classes/class.test.php');
include('classes/class.controller.test.php');

include('classes/class.test_submission.php');
include('classes/class.controller.test_submission.php');


$testController = TestController::constructDefault();
$tests = $testController->getAllTests();

$testSubmissionController = TestSubmissionController::constructDefault();

include('includes/header.php');

?>

<link rel="stylesheet" href="css/tests_available.css">

<h1>Elérhető tesztek</h1>


<div class="row">
        <?php 
        if (count($tests) > 0) { foreach($tests as $test) { ?>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col" >
                        <h5 class="card-title"><?php echo $test['t_name'] ?></h5>
                    </div>
                    <?php if($testSubmissionController->testSubmittedByUser($_SESSION["userEmail"], $test["tid"])) { ?><div class="test-submitted-icon-container col-3 col-sm-2">
                        <i 
                        class='correct-color test-submitted-icon bx bx-check'
                        data-bs-toggle="tooltip" 
                        data-bs-placement="bottom"
                        title="Ezt a tesztet már kitöltötted egyszer">
                    </i> 
                </div>
                    <?php } ?>
                </div>
                <p >Keszitette: <?php echo $test['owner'] ?></p>
                <p >Ekkor: <?php echo $test['date'] ?></p>
                <p >Minimális pontszám: <?php echo $test['min_score'] ?></p>
                <?php if($testSubmissionController->testSubmittedByUser($_SESSION["userEmail"], $test["tid"])) { ?>
                    <p class="<?php if ($testSubmissionController->getSubmissionsByUserAndTestId($_SESSION["userEmail"], $test["tid"])[0]["score"] >= $test['min_score']) echo "correct"; else echo "incorrect"; ?>-color">Elért pontszám: <?php echo $testSubmissionController->getSubmissionsByUserAndTestId($_SESSION["userEmail"], $test["tid"])[0]["score"] ?></p>
                <?php } ?>
                <form action="test.php" method="POST" style="display: inline;">
                    <input type="hidden" name="testid" value="<?php echo $test['tid']; ?>">
                    <button type="submit" name="open-test" class="btn btn-primary">Kitöltés</button>
                    <?php if($testSubmissionController->testSubmittedByUser($_SESSION["userEmail"], $test["tid"])) { ?>
                        <a href="#" class="btn btn-success">Eredmények</a>
                    <?php } ?>
                </form>
            </div>
            </div>
        </div>
        <?php }} else {?>
          <p class="description mb-5 pb-5">Jelenleg nincsenek kitölthető tesztek</p>
        <?php } ?>
    </div>


<?php include('includes/footer.php') ?>