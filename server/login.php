<?php
    
    require_once('./model/DBController.php');
    require_once('./model/User.php');
    require_once('./model/Validator.php');
    
    

    $db = new DBController();
    $validator = new Validator();
    $user = new User(
        $_POST['login'],
        $_POST['name'],
        $_POST['email'],
        $_POST['password'],
        $_POST['confirmPassword']);
    
    $db->findAccount($user, $validator->errorsLog);

    if(empty($validator->errorsLog)) {
        session_start([
            'cookie_lifetime' => 5000
        ]);
        $_SESSION['login'] = $user->login;

        $db->updateAccount($user, $_COOKIE['PHPSESSID']);

        die();

    } else {
        header("http/1.1 200 OK");
        header("Content-Type: application/json");
        echo json_encode($validator->errorsLog);

        die();
    }
?>