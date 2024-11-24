<?php 

session_start();
include('classes/class.dbh.php');
include('classes/class.test_submission.php');
include('classes/class.controller.test_submission.php');

$testSubmissionsController = TestSubmissionController::constructDefault();
$tests = $testSubmissionsController->getTestsSubmittedByUserId($_SESSION["userEmail"]);

include('includes/header.php');

?>

<link rel="stylesheet" href="css/profile.css">

<h1>Eredmények megtekintése</h1>

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
                    <a href="resultpreview.php?id=<?php echo $submission['sub_id'] ?>"><?php echo $submission['score'] ?></a>
                  <?php } ?>

            </div>
        </div>
    </div>

<?php } ?>
</div>


<?php include('includes/footer.php'); ?>