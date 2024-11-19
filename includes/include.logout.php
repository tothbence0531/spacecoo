<?php

if (isset($_POST['logout']) && $_POST['logout'] == 1) {
    session_start();
    include("../classes/class.dbh.php");
    include("../classes/class.logout.php");
    include("../classes/class.controller.logout.php");
    
    $logout = new LogoutController($_SESSION["userEmail"]);
    
    $logout->logoutUser();
    header("location: ../index.php");
}