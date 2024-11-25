<?php

class DeleteAccountController extends DeleteAccount {
  private $email;

  public function __construct($email) {
    $this->email = $email;
  }

  public function deleteUserAccount() {
    /*if($this->wrongEmailInput($this->email) !== false) {
      header("location: profile.php?error=wrongemailinput");
      exit();
    }*/

    $this->unsetUser($this->email);
  }
}