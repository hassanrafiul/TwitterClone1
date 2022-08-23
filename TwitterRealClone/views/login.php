<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Log In Form</title>
    </head>
    <?php include('header.php'); ?>
    
        <h1>Login</h1>
        
        <?php echo "Please create an user if your not registered!!!"; ?>
        
        <form action="../login.php" method="post">
            <label>Email Address</label>
            <input type="text" name="email_address"/><br>
            <label>Password</label>
            <input type="password" name="password"/><br>
            <label>&nbsp;</label>
            <input type="submit" value="LogIn"/>
        </form>
    
    <?php include('footer.php'); ?> 
</html>