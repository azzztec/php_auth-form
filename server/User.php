<?php
    class User {

        protected $db = NULL;
        public $errorLog = [];
        public $name, $login, $email, $password, $confirmPassword;

        public function __construct($userName, $userLogin, $userEmail, $userPassword, $userConfirmPassword) {
            $this->name = $userName;
            $this->login = $userLogin;
            $this->email = $userEmail;
            $this->password = $userPassword;
            $this->confirmPassword = $userConfirmPassword;
        }

        public function login() {
            echo 'Hello';
        }

        public function register() {

        }
    }
?>