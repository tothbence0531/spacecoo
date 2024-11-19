<?php

class LoginController extends Login{

    private $email;
    private $password;

    function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function loginUser() {
        if ($this->emptyInput()) {
            header('location: ../index.php?error=emptyinput');
            exit();
        }

        if ($this->invalidEmail()) {
            header('location: ../index.php?error=invalidemail');
            exit();
        }

        $this->getUser($this->email, $this->password);
    }

    private function emptyInput() {
        // returns true if any inputs left empty, false if it passed
        if(empty($this->email) || empty($this->password)) {
            return true;
        } else {
            return false;
        }
    }

    private function invalidEmail() {
        // returns true if the email failed the validation, false if it passed
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else return false;
    }

}