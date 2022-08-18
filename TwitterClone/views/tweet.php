<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tweet Page</title>

    </head>
    <?php include('mainnav.php'); ?>
    
    
    <body>
        <h2>Welcome to the Tweet Site</h2>
        <h4>Feel Free to Share anything!!</h4>


        <form action ="tweet.php" method="post">
            <label>Text Area</label>
            <input type="text" name="textarea"/><br>
            <label>Image</label>
            <input type="text" name="image"/><br><!-- comment -->
            <input type ="hidden" name ="action" value ="add"/>
            <label>&nbsp;</label>
            <input type="submit" value="add"/>
        </form>
    </body>    
        <table>
            <tr>
                // I dont know how or which way to show
            </tr>
            <?php foreach ( $tweet as $tweet) : ?>
            <tr>

                <td><?php echo $stock->get_textarea(); ?></td>
                <td><?php echo $stock->get_image(); ?></td>
                <td><?php echo $stock->get_user_id(); ?></td>



            </tr>
        </table>
       
    </body>
    <?php include('footer.php'); ?> 
</html>

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
        
        
        <table>
            <tr>
                // I dont know how or which way to show
            </tr>
            <?php foreach ( $tweet as $tweet) : ?>
            <tr>

                <td><?php echo $stock->get_textarea(); ?></td>
                <td><?php echo $stock->get_image(); ?></td>
                <td><?php echo $stock->get_user_id(); ?></td>



            </tr>
        </table>
    </body>
    <?php include('footer.php'); ?> 
</html>