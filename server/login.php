<?php
    require_once('./DBController.php');
    require_once('./User.php');
    require_once('./Validator.php');
    session_start();
    

    $db = new DBController();
    $validator = new Validator();
    $user = new User(
        $_POST['name'],
        $_POST['login'],
        $_POST['email'],
        $_POST['password'],
        $_POST['confirmPassword']);
    
    $db->checkAccount($user, $validator->errorsLog);
    
    
    if(empty($validator->errorsLog)) {
        header("http/1.1 200 OK");
        $_SESSION['login'] = $user->login;
        die();
    } else {
        header("http/1.1 200 OK");
        header("Content-Type: application/json");
        echo json_encode($validator->errorsLog);
        die();
    }
?>