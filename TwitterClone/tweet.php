<?php

try {
    require_once 'utility/ensured_logged_in.php';
    require_once 'models/database.php';
    require_once "models/tweet.php";

    $action = htmlspecialchars(filter_input(INPUT_POST, "action"));

    $textarea = htmlspecialchars(filter_input(INPUT_POST, "textarea"));

    $user_id = htmlspecialchars(filter_input(INPUT_POST, "user_id"));
    //problem over here with image
    $image = filter_input(INPUT_POST, "image", FILTER_VALIDATE_FLOAT);

    if ($action == "add" && $textarea != "" && $user_id != "" && $image != "") {


        $tweet = new Tweet($textarea, $user_id, $image);

        add_tweet($tweet);
        
    } else if ($action != "" ) {
        echo"Missing tweet. Please dont be scared to share anything!!!!";
        include('views/error.php');
    }
    
    $tweets = list_tweet();
    
    include('views/tweet.php');
    
} catch (Exception $e) {
    $error_message = $e->getMessage();
    include('views/error.php');
}

