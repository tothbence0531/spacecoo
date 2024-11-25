<?php 

session_start();

if (!isset($_SESSION["userEmail"])) {
    header("location: index.php?error=unauthorized");
}

include('classes/class.dbh.php');
include('classes/class.test_submission.php');
include('classes/class.controller.test_submission.php');

$testSubmissionsController = TestSubmissionController::constructDefault();
$tests = $testSubmissionsController->getTestsSubmittedByUserId($_SESSION["userEmail"]);

include('includes/header.php');

?>

<link rel="stylesheet" href="css/profile.css">

<h1>Eredmények megtekintése</h1>

<?php if (count($tests) == 0) { ?>
<p class="description mb-5 pb-5">Nincs még tesztkitöltésed</p>
<?php } ?>

<div class="accordion accordion-flush" id="accordionFlushTests">
<?php foreach($tests as $test) { ?>

  <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-<?php echo $test['tid'] ?>" aria-expanded="false" aria-controls="flush-<?php echo $test['tid'] ?>">
                <?php echo $test['t_name'] ?>
            </button>
        </h2>
        <div id="flush-<?php echo $test['tid'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushTests">
            <div class="accordion-body container-fluid">

                  <?php 
                  $submissions = $testSubmissionsController->getSubmissionsByUserAndTestId($_SESSION["userEmail"], $test['tid']);
                  foreach ($submissions as $submission) { ?>
                    <a class="text-decoration-none mb-4" href="resultpreview.php?id=<?php echo $submission['sub_id'] ?>">
                        <div class="row">
                            <div class="col"> <?php echo $submission['date']; ?></div>
                            <div class="col text-end"> <?php echo $submission['score'] . " pont"; ?></div>
                        </div>
                    </a>
                  <?php } ?>

            </div>
        </div>
    </div>

<?php } ?>
</div>


<?php include('includes/footer.php'); ?>