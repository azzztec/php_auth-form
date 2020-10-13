<?php
session_start();
    if(isset($_SESSION['login'])) {
        header('location: ./success.php');
    }
?>

<?php include('./tamplates/header.php') ?>

<form id="login">
    <label for="Login">Login</label>
    <input type="text" id="Login" placeholder="Login" name="login" required>

    <label for="Password">Password</label>
    <input type="password" id="Password" placeholder="Password" name="password" required>

    <div class="error_msg hidden" data-error-name="wrongUser"></div>
    <input type="submit" value="LOGIN" name='submitLogin'>
</form>
<div>
    or <a href="./register.php">Register</a>
</div>

<?php include('./tamplates/footer.php') ?>