<?php
    session_start();

    if(isset($_SESSION['login'])) {
        include('./success.php');
    } else {
        include('./register.php');
    }
?>