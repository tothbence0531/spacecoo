<?php 

include('classes/class.dbh.php');
include('classes/class.test.php');
include('classes/class.controller.test.php');

$limitedTestController = TestController::constructWithLimit(3);
$tests = $limitedTestController->getLimitedAmountOfTests();

include('includes/header.php');
?>


<div class="container-fluid">
    <h1>Főoldal</h1>
    <div class="row">
        <?php foreach($tests as $test) { ?>
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
        <?php } ?>
    </div>

    <div class="row searchrow">
        <input class="col" placeholder="Tesztek keresése" type="text" name="searchbar" id="searchbar">
    </div>

    <div class="row searchrow">
        <div id="searchresults"></div>
    </div>

    
</div>




<?php 
include('includes/footer.php');
?>