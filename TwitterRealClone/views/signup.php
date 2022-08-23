<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Users List</title>
    </head>
    <?php include ('header.php'); ?>
    <body>
        
        <h1>CREATE USERS</h1>
        
        
        <form action ="../signup.php" method="post">
            
            <label>Email Address:</label>
            <input type="text" name="email_address"/><br>
            <label>UserName:</label>
            <input type="text" name="username"/><br>
            <label>Password:</label>
            <input type="text" name="password"/><br> 
            <input type ="hidden" name ="action" value ="create"/>
            <label>&nbsp;</label>
            <input type="submit" value="Create User"/><br>
            
            
        </form>
    </body>
    <?php include ('footer.php'); ?>
</html>