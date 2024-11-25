<?php

session_start();

if (isset($_POST["deleteAccountSubmit"])) {
  $email = $_SESSION["userEmail"];

  include("../classes/class.dbh.php");
  include("../classes/class.logout.php");
  include("../classes/class.controller.logout.php");
  
  $logout = new LogoutController($_SESSION["userEmail"]);
  
  $logout->logoutUser();
  
  include("../classes/class.deleteAccount.php");
  include("../classes/class.controller.deleteAccount.php");

  $deleteAccount = new DeleteAccountController($email);

  $deleteAccount->deleteUserAccount();

  header('location: ../index.php?error=none');
}