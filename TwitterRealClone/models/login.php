<?php

function login($email_address, $password) {

    global $database;
    
    $query = 'SELECT email_address, password FROM user'
            . 'where email_address = :email_address' ;

  
    $statement = $database->prepare($query);

    $statement->bindValue(":email_address", $email_address);
    
    
    $statement->execute();

    $user = $statement->fetch();
    
    $statement->closeCursor();
    
    if($user == NULL) {
        return false;
    } 
    
    $password_hash = $user['password'];
    
    return password_verify($password, $password_hash);
}

function list_users($email_address) {

    global $database;

    $query = 'SELECT email_address, username, password, id FROM user'
            . 'where email_address = :email_address';

    // prepare the query
    $statement = $database->prepare($query);
    
    $statement->bindValue(":email_address", $email_address);
    //run the query
    $statement->execute();

    // fetch the data
    $users = $statement->fetch();

    $statement->closeCursor();

    return $users;
}