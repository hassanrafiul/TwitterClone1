<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Tweet Page</title>  
    </head>
    <?php include ('header.php'); ?>
    <body>
        <table>
            <tr>
                <th>User_Id</th>
                <th>Text Area</th>
                <th>Timestamp</th>
                <th>ID</th>
            </tr> 
            <?php foreach ($tweets as $tweet) : ?>
                <tr>
                    <td><?php echo $tweet->get_user_id(); ?></td>
                    <td><?php echo $tweet->get_textarea(); ?></td>
                    <td><?php echo $tweet->get_timestamp(); ?></td>
                    <td><?php echo $tweet->get_id(); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        
        <h1>Welcome to the Tweet Site</h1>
        <h4>Feel Free to Share anything!!</h4>
        
        <form action ="tweet.php" method="post">
            <label>User Id</label>
            <input type="text" name="user_id"/><br>
            <label>Text Area</label>
            <input type="text" name="textarea"/><br>
            
            <input type ="hidden" name ="action" value ="add"/>
            <label>&nbsp;</label>
            <input type="submit" value="add Tweet"/>
        </form>
        <form action="tweet.php" method= "post" enctype ="multipart/form-data">
            <input type ="file" name="file">
            <input type ="hidden" name ="action" value ="image"/>
            <button type="submit" name ="submit">Upload Image</button>
            
        </form>    
    </body>
    <?php include('footer.php'); ?> 
</html>
