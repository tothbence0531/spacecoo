<?php 

if(isset($_POST['input'])) {

  include("../classes/class.dbh.php");
  include("../classes/class.test.php");
  include("../classes/class.controller.test.php");
  
  $testController = TestController::constructDefault();
  $tests = $testController->getTestsForSearch($_POST['input']);

  if (count($tests) === 0) {
    echo '<p class="text-danger text-center m-0">Nincs ilyen teszt</p>';
  } else {
    foreach($tests as $test) { ?>
      <form action="test.php" method="POST" id="open-test-form" >
        <a href="javascript:{}" onclick="document.getElementById('open-test-form').submit();" ><?php echo $test['t_name']; ?></a>
        <input type="hidden" name="testid" value="<?php echo $test['tid']; ?>">
        <input type="hidden" name="open-test" value="1">
      </form>
    <?php }
  }

}


?>