<?php
    session_start();
    if(isset($_SESSION['login'])) {
        header('location: ./success.php');
    }
?>

<?php include('./tamplates/header.php') ?>

<form id="registration">
    <label for="Name">Name</label>
    <div class="error_msg hidden" data-error-name="name"></div>
    <input type="text" id="Name" placeholder="Name" name="name" required>

    <label for="Email">E-mail</label>
    <div class="error_msg hidden" data-error-name="email"></div>
    <input type="text" id="Email" placeholder="E-mail" name="email" required>

    <label for="Login">Login</label>
    <div class="error_msg hidden" data-error-name="login"></div>
    <input type="text" id="Login" placeholder="Login" name="login" required>

    <label for="Password">Password</label>
    <div class="error_msg hidden" data-error-name="password"></div>
    <input type="password" id="Password" placeholder="Password" name="password" required>

    <label for="ConfirmPassword">Confirm Password</label>
    <div class="error_msg hidden" data-error-name="confirmPassword"></div>
    <input type="password" id="ConfirmPassword" placeholder="Confirm Password" name="confirmPassword" required>

    <input type="submit" value="REGISTER" name="submitRegistration">
</form>
<div>
    or <a href="./login.php">Login</a>
</div>

<?php include('./tamplates/footer.php') ?>