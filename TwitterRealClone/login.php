<?php

session_start();

try {
    require_once 'utility/ensured_logged_in.php';
    require_once 'models/database.php';
    require_once 'models/login.php';

    $action = htmlspecialchars(filter_input(INPUT_GET, "action"));
    $email_address = htmlspecialchars(filter_input(INPUT_POST, "email_address"));
    $password = htmlspecialchars(filter_input(INPUT_POST, "password"));

    $error_message = "";

    if ($action == "logout") {
        
        $_SESSION = array();
        
        session_destroy();
    }

    if ($email_address != "" && $password != "") {

        if (login($email_address, $password)) {

            $__SESSION['is_logged_in'] = true;
            
            $user = list_user($email_address);
            
            $__SESSION['email_address'] = $user[0];
            $__SESSION['username'] = $user[1];
            $__SESSION['user_id'] = $user[3];
            

            header("Location: tweet.php");
        }
    } else {
        $error_message;
    }
    
    include('views/login.php');
    
    
    
} catch (Exception $e) {
    $error_message = $e->getMessage();
    include('views/error.php');
}