<?php
    include('./config/config.php');

    class DBController {
        public $users;

        public function __construct() {
            $this->users = simplexml_load_file('./data/users.xml');
        }

        public function createAccount($newUser, &$errorsLog) {
            foreach($this->users as $user) {
                if(strcasecmp($user->email, $newUser->email) === 0) {
                    $errorsLog['email'] = "This email is already registered";
                    return;
                }
                
                if(strcasecmp($user->login, $newUser->login) === 0) {
                    $errorsLog['login'] = "This login already exists";
                    return;
                }
            }
            $newAccount = $this->users->addChild('user');
            $newAccount->addChild('name', $newUser->name);
            $newAccount->addChild('login', $newUser->login);
            $newAccount->addChild('email', $newUser->email);
            $newAccount->addChild('password', SALT . md5($newUser->password));
            file_put_contents('./data/users.xml', $this->users->asXML());
        }

        public function checkAccount($checkUser, &$errorsLog) {
            foreach($this->users as $user) {
                if(strcasecmp($user->login, $checkUser->login) === 0) {
                    if(strcasecmp($user->password, SALT . md5($checkUser->password)) === 0) {
                        return;
                    } else {
                        $errorsLog['wrongUser'] = 'Wrong password';
                        return;
                    }
                } else {
                    $errorsLog['wrongUser'] = 'Wrong login';
                    return;
                }
            }
        }
    }
?>