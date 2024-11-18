<?php

class SignupController extends Signup{

    private $firstName;
    private $secondName;
    private $fullName;
    private $email;
    private $role;
    private $password;
    private $rePassword;

    public function __construct($firstName, $secondName, $email, $role, $password, $rePassword) {
        $this->firstName = $firstName;
        $this->secondName = $secondName;
        // full name constructed from first, second name
        $this->fullName = trim($firstName) . " " . trim($secondName);
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
        $this->rePassword = $rePassword;
    }

    public function signupUser() {
        if($this->emptyInput() !== false) {
            header("location: ../signup.php?error=emptyinput");
            exit();
        }

        if($this->invalidName() !== false) {
            header("location: ../signup.php?error=invalidname");
            exit();
        }

        if($this->invalidEmail() !== false) {
            header("location: ../signup.php?error=invalidemail");
            exit();
        }

        if($this->passwordsMatch() !== true) {
            header("location: ../signup.php?error=passwordsdiffer");
            exit();
        }

        if($this->emailTaken($this->email) !== false) {
            header("location: ../signup.php?error=emailtaken");
            exit();
        }

        if($this->invalidPassword() !== false) {
            header("location: ../signup.php?error=invalidpassword");
            exit();
        }

        $this->setUser($this->fullName, $this->email, $this->role, $this->password);
    }

    private function invalidPassword() {
        // returns true if the password entered failed the regex test
        if(!preg_match("/^(?=.*[0-9])(?=.*[A-Z])(?=.*[@$.#!%*?&^])[A-Za-z0-9@$.#!%*?&^]{8,}$/", $this->password)) {
            return true;
        } else {
            return false;
        }
    }

    private function emptyInput() {
        // returns true if any inputs left empty, false if it passed
        if(empty($this->firstName) || empty($this->secondName) || empty($this->email) || empty($this->role) || empty($this->password) || empty($this->rePassword)) {
            return true;
        } else {
            return false;
        }
    }

    private function invalidName() {
        // returns true if the name failed the regex, true if it passed
        if(!preg_match("/^[A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ]+(?: [A-Za-záéíóöőúüűÁÉÍÓÖŐÚÜŰ]+)*$/", $this->fullName)) {
            return true;
        } else return false;
    }

    private function invalidEmail() {
        // returns true if the email failed the validation, false if it passed
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else return false;
    }

    private function passwordsMatch() {
        // returns true if the two passwords match, false if it doesnt
        if($this->password !== $this->rePassword) {
            return false;
        } else return true;
    }

    // checking if email already exists in db --> class.dbh.php > emailTaken()

}