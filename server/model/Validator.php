<?php
    class Validator {
        public $errorsLog = NULL;

        public function __construct() {
            $this->errorsLog = [];
        }

        public function validate($user) {
            $this->validateName($user->name);
            $this->validateLogin($user->login);
            $this->validateEmail($user->email);
            $this->validatePassword($user->password);
            $this->validateConfirmPassword($user->confirmPassword, $user->password);

            // return $this->errorsLog;
        }

        private function validateName($name) {
            if(!isset($name) || !preg_match('/^\w{2,128}$/', trim($name))) {
                $this->errorsLog['name'] = 'Name must contain at least 2 characters(with letters and numbers)';
            }
        }

        private function validateLogin($login) {
            if(!isset($login) || !preg_match('/^\w{6,128}$/', trim($login))) {
                $this->errorsLog['login'] = 'Login must contain at least 6 characters(both letters or numbers)';
            }
        }

        private function validateEmail($email) {
            if(!isset($email) || !preg_match('/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u', trim($email))) {
                $this->errorsLog['email'] = 'Unvalid E-mail';
            }
        }

        private function validatePassword($password) {
            if(!isset($password) || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^\w\s]).{6,}/', trim($password))) {
                $this->errorsLog['password'] = 'Password must contain at least 6 characters with numbers, uppercase and symbols';
            }
        }

        private function validateConfirmPassword($confirmPassword, $realPassword) {
            if($confirmPassword !== $realPassword) {
                $this->errorsLog['confirmPassword'] = 'Passwords dont match';
            }
        }
    }
?>