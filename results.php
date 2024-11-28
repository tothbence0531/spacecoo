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

if($_SESSION["roleId"] === 1) {
    $bestStudents = $testSubmissionsController->getBestStudentsByTeacherEmail($_SESSION["userEmail"]);
}


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

<?php if($_SESSION["roleId"] === 1 && count($bestStudents) > 0) { ?>

<h1 class="mt-5">Legjobb tanulók</h1>

<div class="table-container">

    <table>
        <tr>
            <th>Sorszám</th>
            <th>Tanuló neve</th>
            <th>Tanuló email címe</th>
            <th>Megírt tesztek száma</th>
            <th>Átlag pontszám</th>
            <th>Legjobb pontszám</th>
            <th>Utolsó kitöltött teszt</th>
            <th>Utolsó teszten elért pontszám</th>
        </tr>

    <?php $studentCounter = 0; foreach($bestStudents as $student) { $studentCounter++;?>

        <tr>
            <td><?php echo $studentCounter ?></td>
            <td><?php echo $student["student_name"] ?></td>
            <td><?php echo $student["student_email"] ?></td>
            <td><?php echo $student["tests_completed"] ?></td>
            <td><?php echo $student["avg_score"] ?></td>
            <td><?php echo $student["best_score"] ?></td>
            <td><?php echo $student["last_test_name"] ?></td>
            <td><?php echo $student["last_test_score"] ?></td>
        </tr>

    <?php } } ?>

    </table>

</div>




<?php include('includes/footer.php'); ?>