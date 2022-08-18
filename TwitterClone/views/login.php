<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Log In Form</title>
    </head>
    <?php include('mainnav.php'); ?>
    <body>
        <h2>Login</h2>
        <?php echo $message ?>
        <form action ="login.php" method="post">
            <label>User Name</label>
            <input type="text" name="username"/><br>
            <label>Password</label>
            <input type="password" name="password"/><br><!-- comment -->
            <label>&nbsp;</label>
            <input type="submit" value="Login"/>
        </form>
        
        
        <?php echo "Please create an user if your not registered!!!"; ?>
        
        <h2>Create User</h2>
        <form action ="login.php" method="post">
            <label>User Name:</label>
            <input type="text" name="username"/><br>
            <label>Password</label>
            <input type="password" name="password"/><br>
            <input type ="hidden" name ="action" value ="add"/>
            <label>&nbsp;</label>
            <input type="submit" value="Create User"/><br>
        </form>
    </body>
    <?php include('footer.php'); ?> 
</html>