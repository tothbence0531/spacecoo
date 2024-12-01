<?php

class DeleteAccountController extends DeleteAccount {
  private $email;

  public function __construct($email) {
    $this->email = $email;
  }

  public function deleteUserAccount() {
    $this->unsetUser($this->email);
  }
}