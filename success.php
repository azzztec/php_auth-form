<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header('location: ./');
    }
?>

<?php include('./tamplates/header.php') ?>

    <h1>HELLO, <?php echo $_SESSION['login'] ?></h1>
    <form id="logout" action="./server/logout.php" method="POST">
        <input type="submit" value='LOGOUT' name='submitLogout'>
    </form>

<?php include('./tamplates/footer.php') ?>