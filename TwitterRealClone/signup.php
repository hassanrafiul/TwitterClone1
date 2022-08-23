<?php
session_start();
try{
    require_once 'utility/ensured_logged_in.php';
    require_once 'models/database.php';
    require_once 'models/signup.php';


    $action = htmlspecialchars(filter_input(INPUT_POST, "action"));    
    $email_address = htmlspecialchars(filter_input(INPUT_POST, "email_address"));
    $username = htmlspecialchars(filter_input(INPUT_POST, "username"));
    $password = htmlspecialchars(filter_input(INPUT_POST, "password"));
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
    $error_messsage = "";
    
    if ($action == "create" && $email_address != "" && $username != "" && $password != "") {

        $user = new User($email_address, $username, $password_hash, 0);
        
        create_user($user);
        
//        header ("Location: header.php"); 

    } else if ($action != "") {
        
        echo $error_messsage = "Missing email address and username and password.";
//        include('views/error.php');
       
    }
//    include ('views/signup.php');
    include ('views/signup.php');
    
    
} catch (Exception $e) {
    $error_message = $e->getMessage();
    include('views/error.php');
}
    
