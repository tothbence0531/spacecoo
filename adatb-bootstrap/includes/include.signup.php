<?php

if(isset($_POST["signupSubmit"])) {

    $firstName = $_POST["firstName"];
    $secondName = $_POST["secondName"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $password = $_POST["password"];
    $rePassword = $_POST["repassword"];

    include "../classes/class.dbh.php";
    include "../classes/class.signup.php";
    include "../classes/class.controller.signup.php";    

    $signup = new SignupController($firstName, $secondName, $email, $role, $password, $rePassword);

    $signup->signupUser();

    header("location: ../signup.php?error=none");
}