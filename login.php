<?php include('./tamplates/header.php') ?>

<form id="loginForm">
    <label for="Login">Login</label>
    <div class="error_msg hidden" data-error-name="login"></div>
    <input type="text" id="Login" placeholder="Login" name="login" required>

    <label for="Password">Password</label>
    <div class="error_msg hidden" data-error-name="password"></div>
    <input type="password" id="Password" placeholder="Password" name="password" required>

    <input type="submit" value="LOGIN">
</form>

<?php include('./tamplates/footer.php') ?>