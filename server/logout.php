<?php
    
    require_once('./model/DBController.php');
    require_once('./model/User.php');

    session_start();
    unset($_SESSION['id']);
    session_destroy();

    header("http/1.1 200 OK");
    header("Content-Type: application/json");
    echo json_encode([]);
    die();
?>