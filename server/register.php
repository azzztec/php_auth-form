<?php
    require_once('./DBController.php');
    require_once('./User.php');
    require_once('./Validator.php');

    $db = new DBController();
    $validator = new Validator();
    $user = new User(
        $_POST['name'],
        $_POST['login'],
        $_POST['email'],
        $_POST['password'],
        $_POST['confirmPassword']);

    $validator->validate($user);
    if(!empty($validator->errorsLog)) {
        header("http/1.1 200 OK");
        header("Content-Type: application/json");
        echo json_encode($validator->errorsLog);
        die();
    }
    
    $db->createAccount($user, $validator->errorsLog);
    
    if(empty($validator->errorsLog)) {
        header("http/1.1 200 OK");
        die();
    } else {
        header("http/1.1 200 OK");
        header("Content-Type: application/json");
        echo json_encode($validator->errorsLog);
        die();
    }
?>