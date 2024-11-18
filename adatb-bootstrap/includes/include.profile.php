<?php

if (isset($_POST["editUserGeneralSubmit"]) || isset($_POST["editUserPasswordSubmit"])) {

  if (isset($_POST["editUserGeneralSubmit"])) {
    $newFirstName = $_POST["updateFirstName"];
    $newLastName = $_POST["updateLastName"];
    $newEmail = $_POST["updateEmail"];
    $oldPassword = NULL;
    $newPassword = NULL;
    $newRePassword = NULL;
  }

  if (isset($_POST["editUserPasswordSubmit"])) {
    $newFirstName = NULL;
    $newLastName = NULL;
    $newEmail = NULL;
    $oldPassword = $_POST["oldPassword"];
    $newPassword = $_POST["newPassword"];
    $newRePassword = $_POST["newRePassword"];
  }

  include "../classes/class.dbh.php";
  include "../classes/class.profile.php";
  include "../classes/class.controller.profile.php";    
  
  session_start();

  $editGeneral = new ProfileController($_SESSION["userEmail"], $oldPassword, $newPassword, $newRePassword, $newFirstName, $newLastName, $newEmail);

  if (isset($_POST["editUserGeneralSubmit"])) {
    $editGeneral->editUserGeneral();
  }

  if (isset($_POST["editUserPasswordSubmit"])) {
    $editGeneral->editUserPassword();
  }

  header("location: ../profile.php?error=none");
}