<?php
    class User {

        protected $db = NULL;
        public $errorLog = [];
        public $name, $login, $email, $password, $confirmPassword;

        public function __construct($userLogin = '', $userName = '', $userEmail = '', $userPassword = '', $userConfirmPassword = '') {
            $this->name = $userName;
            $this->login = $userLogin;
            $this->email = $userEmail;
            $this->password = $userPassword;
            $this->confirmPassword = $userConfirmPassword;
        }

        // public function login($db, $user, $errorsLog) {
            
        // }

        // public function register() {

        // }
    }
?>