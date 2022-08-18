<!DOCTYPE html>

<header>
    
    
    <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) { ?>

        <a href="login.php?action=logout">Log Out</a>

    <?php } else { ?>
        <a href="login.php">Log In</a>&nbsp;
    <?php } ?>    
    

</header>