<?php 

include('classes/class.dbh.php');
include('classes/class.test.php');
include('classes/class.controller.test.php');

$limitedTestController = TestController::constructWithLimit(3);
$limitedTests = $limitedTestController->getLimitedAmountOfTests();
$mostSubmittedTests = $limitedTestController->getLimitedAmountOfTestsOrderedBySubmissions();
$bestPerformedTests = $limitedTestController->getTestsBestPerformedOnByUsers();

include('includes/header.php');
?>


<div class="container-fluid">
    <h1>Főoldal</h1>
<?php if(count($limitedTests) > 0) { ?>
    <h3 class="mt-3 grey-color">Friss tesztek:</h3>
    <div class="row">
        <?php foreach($limitedTests as $test) { ?>
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
<?php } ?>
    <div class="row searchrow">
        <input class="col" placeholder="Tesztek keresése" type="text" name="searchbar" id="searchbar">
    </div>

    <div class="row searchrow">
        <div id="searchresults"></div>
    </div>
<?php if (count($mostSubmittedTests) > 0) { ?>
    <h3 class="mt-3 grey-color">Felkapott tesztek:</h3>
    <div class="row">
        <?php foreach($mostSubmittedTests as $test) { ?>
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

    <?php } ?>

    <?php if(count($bestPerformedTests) > 0) { ?>

    <h3 class="mt-3 grey-color">Legsikeresebb tesztek:</h3>

    <div class="table-container">

        <table>
            <tr>
                <th>Teszt neve</th>
                <th>Kitöltések száma</th>
                <th>Átlagos pontszám</th>
            </tr>

        <?php foreach($bestPerformedTests as $test) { ?>

            <tr>
                <td><?php echo $test["t_name"] ?></td>
                <td><?php echo $test["submission_count"] ?></td>
                <td><?php echo $test["avg_points"] ?></td>
            </tr>

        <?php } ?>

        </table>

    </div>

    <?php } ?>
    
</div>




<?php 
include('includes/footer.php');
?>