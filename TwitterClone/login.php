<?php
session_start();


try {
    require_once 'models/database.php';
    require_once 'models/login.php';
    
    $action = htmlspecialchars(filter_input(INPUT_GET, "action")); 
    
    $username = htmlspecialchars(filter_input(INPUT_POST, "username"));
    $password = htmlspecialchars(filter_input(INPUT_POST, "password"));
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
    $message = "";
    
    if( $action == "logout"){
        $_SESSION = array();
        session_destroy();
    }
    
    if ($username != "" && $password != "" ) {
        if(login($username, $password)){
            
            $_SESSION['is_logged_in'] = true;
            
            include('views/tweet.php');
            
        } else {
            
            $message = "Login has failed please check the typed username and password or create an user";
            
            include('views/error.php');
            
            
            
            // problem which one to show include
           
        }
        
    }
    
    if ($action == "add" && $username != "" && $password != "") {
        
        $user = new User($username, $password);
        
        create_user($user);
    }
    include('views/login.php');
    
} catch (Exception $e) {
    $error_message = $e->getMessage();
    include('views/error.php');
}

