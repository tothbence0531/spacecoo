<?php

class LogoutController extends Logout {

    private $email;

    public function __construct($email) {
        $this->email = $email;
    }

    public function logoutUser() {
        
        $this->setStatus($this->email);
        session_start();
        session_unset();
        session_destroy();
    }

}