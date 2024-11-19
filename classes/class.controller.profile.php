<?php

class ProfileController extends Profile {
  private $oldPassword;
  private $oldEmail;
  private $newPassword;
  private $newRePassword;
  private $newFirstName;
  private $newLastName;
  private $newEmail;
  private $newFullName;
  //private $currentPassword;

  public function __construct($oldEmail, $oldPassword, $newPassword, $newRePassword, $newFirstName, $newLastName, $newEmail, /*$currentPassword*/) {
    $this->oldEmail = $oldEmail;
    $this->oldPassword = $oldPassword;
    $this->newPassword = $newPassword;
    $this->newRePassword = $newRePassword;
    $this->newFirstName = $newFirstName;
    $this->newLastName = $newLastName;
    $this->newEmail = $newEmail;
    //$this->currentPassword = $currentPassword;
    // full name constructed from first, second name
    $this->newFullName = trim($newFirstName) . " " . trim($newLastName);
  }

  public function editUserGeneral() {
    if($this->emptyInputGeneral() !== false) {
        header("location: ../profile.php?error=emptyinput");
        exit();
    }

    if($this->invalidName() !== false) {
        header("location: ../profile.php?error=invalidname");
        exit();
    }

    if($this->invalidEmail() !== false) {
        header("location: ../profile.php?error=invalidemail");
        exit();
    }

    if($this->emailTaken($this->newEmail, $this->oldEmail) !== false) {
        header("location: ../profile.php?error=emailtaken");
        exit();
    }

    $this->setUserGeneral($this->newFullName, $this->newEmail, $this->oldEmail);

  }

  public function editUserPassword() {
    if($this->emptyInputPassword() !== false) {
        header("location: ../profile.php?error=emptyinput");
        exit();
    }

    if($this->passwordsMatch() !== true) {
        header("location: ../profile.php?error=passwordsdiffer");
        exit();
    }

    if($this->invalidPassword() !== false) {
        header("location: ../profile.php?error=invalidpassword");
        exit();
    }

    // invalidCurrentPassword() --> class.profile.php
    if($this->invalidCurrentPassword($this->oldPassword, $this->oldEmail) !== false) {
      header("location: ../profile.php?error=invalidcurrentpassword");
      exit();
  }

  $this->setUserPassword($this->newPassword, $this->oldEmail);

}

  private function invalidPassword() {
    // returns true if either of the entered passwords fail the regex testm false if every password passes
    if(!preg_match("/^(?=.*[0-9])(?=.*[A-Z])(?=.*[@$.#!%*?&^])[A-Za-z0-9@$.#!%*?&^]{8,}$/", $this->newPassword) || !preg_match("/^(?=.*[0-9])(?=.*[A-Z])(?=.*[@$.#!%*?&^])[A-Za-z0-9@$.#!%*?&^]{8,}$/", $this->newRePassword) || !preg_match("/^(?=.*[0-9])(?=.*[A-Z])(?=.*[@$.#!%*?&^])[A-Za-z0-9@$.#!%*?&^]{8,}$/", $this->oldPassword)) {
        return true;
    } else {
        return false;
    }
  }

private function emptyInputGeneral() {
    // returns true if any inputs left empty, false if it passed
    if(empty($this->newFirstName) || empty($this->newLastName) || empty($this->newEmail)) {
        return true;
    } else {
        return false;
    }
}

private function emptyInputPassword() {
  // returns true if any inputs left empty, false if it passed
  if(empty($this->oldPassword) || empty($this->newPassword) || empty($this->newRePassword)) {
      return true;
  } else {
      return false;
  }
}

private function invalidName() {
    // returns true if the name failed the regex, true if it passed
    if(!preg_match("/^[A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ]+(?: [A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ]+)*$/", $this->newFullName)) {
        return true;
    } else return false;
}

private function invalidEmail() {
    // returns true if the email failed the validation, false if it passed
    if(!filter_var($this->newEmail, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else return false;
}

private function passwordsMatch() {
    // returns true if the two passwords match, false if it doesnt
    if($this->newPassword !== $this->newRePassword) {
        return false;
    } else return true;
}
}