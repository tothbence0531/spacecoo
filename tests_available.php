<?php 

session_start();

include('classes/class.dbh.php');
include('classes/class.test.php');
include('classes/class.controller.test.php');

$testController = TestController::constructDefault();
$tests = $testController->getAllTests();

include('includes/header.php');

?>

<h1>Elérhető tesztek</h1>


<div class="row">
        <?php 
        if (count($tests) > 0) { foreach($tests as $test) { ?>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $test['t_name'] ?></h5>
                <p >Keszitette: <?php echo $test['owner'] ?></p>
                <p >Ekkor: <?php echo $test['date'] ?></p>
                <p >Minimális pontszám: <?php echo $test['min_score'] ?></p>
                <form action="test.php" method="POST" style="display: inline;">
                    <input type="hidden" name="testid" value="<?php echo $test['tid']; ?>">
                    <button type="submit" name="open-test" class="btn btn-primary">Kitöltés</button>
                </form>
            </div>
            </div>
        </div>
        <?php }} else {?>
          <p class="description mb-5 pb-5">Jelenleg nincsenek kitölthető tesztek</p>
        <?php } ?>
    </div>


<?php include('includes/footer.php') ?>