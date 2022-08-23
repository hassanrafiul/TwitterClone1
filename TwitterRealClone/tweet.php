<?php

session_start();

try {
    require_once 'utility/ensured_logged_in.php';
    require_once 'models/database.php';
    require_once 'models/tweet.php';
    require_once 'models/signup.php';
    require_once 'models/login.php';

    $action = htmlspecialchars(filter_input(INPUT_POST, "action"));

    $textarea = htmlspecialchars(filter_input(INPUT_POST, "textarea"));

    $tweets = list_tweet();

    $error_messsage = "";

    if ($action == "add" && $textarea != "") {

        $tweet = new Tweet($_SESSION['user_id'], $textarea, "", 0);

        add_tweet($tweet);
    } else if ($action == "") {


        $error_message = "Missing tweet. Please dont be scared to share anything!!!!";
    }
//    } else if ($action == "image") {
//
//        $file = $_FILES['file'];
//
//        $fileName = $_FILES['file']['name'];
//        $fileTmpName = $_FILES['file']['tmp_name'];
//        $fileSize = $_FILES['file']['size'];
//        $fileError = $_FILES['file']['error'];
//        $fileType = $_FILES['file']['type'];
//
//        $fileExt = explode('.', $fileName);
//        $fileActualExt = strtolower(end($fileExt));
//
//        $allowed = array('jpg', 'jpeg', 'png');
//
//        if (in_array($fileActualExt, $allowed)) {
//            if ($fileError === 0) {
//                if ($fileSize < 1000000) {
//                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
//                    $fileDestination = 'tweets/' . $fileNameNew;
//                    move_uploaded_file($fileTmpName, $fileDestination);
//                    header("Location : tweets.php");
//                } else {
//                    echo "file size big!";
//                }
//            } else {
//                echo "error uploading  file!";
//            }
//        } else {
//            echo "file type  not supported";
//        }
//    }

    include ('views/tweets.php');

} catch (Exception $e) {
    $error_message = $e->getMessage();
    include('views/error.php');
}

