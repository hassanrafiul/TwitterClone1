<!DOCTYPE html>

<header>
    <a href="HTTPS://localhost/TwitterRealClone/index.php">Home</a>&nbsp;

    <?php if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) { ?>
        <a href="HTTPS://localhost/TwitterRealClone/views/tweet.php">Tweet</a>&nbsp;
        <a href="HTTPS://localhost/TwitterRealClone/views/login.php?action=logout">Log Out</a>
    <?php } else { ?>
        <a href="HTTPS://localhost/TwitterRealClone/views/login.php">Log In</a>&nbsp;
        <a href="HTTPS://localhost/TwitterRealClone/views/signup.php">Sign Up</a>&nbsp;
    <?php } ?>

</header>

