<?php

if(isset($_POST["loginSubmit"])) {

    $email = $_POST["loginEmail"];
    $password = $_POST["loginPassword"];

    include "../classes/class.dbh.php";
    include "../classes/class.login.php";
    include "../classes/class.controller.login.php";    

    $signup = new LoginController($email, $password);

    $signup->loginUser();

    header("location: ../index.php?error=none");
}