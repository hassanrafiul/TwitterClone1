<?php


class User{
    
    private $username , $password, $id;
    
    
    public function __construct($username, $password, $id = 0) {
        $this->username = $username;
        $this->password = $password;
        $this->id = $id;
    }

    
    public function get_username() {
        return $this->username;
    }

    public function get_password() {
        return $this->password;
    }

    public function set_username($username) {
        $this->username = $username;
    }

    public function set_password($password) {
        $this->password = $password;
    }
    
}

function login($username, $password) {

    global $database;
    
    $query = 'SELECT username, password_hash FROM user '
            . 'where username = :username';

  
    $statement = $database->prepare($query);

    $statement->bindValue(":username", $username);
   
    $statement->execute();

    $user = $statement->fetch();
    
    $statement->closeCursor();
    
    if($username == NULL) {
        return false;
    }
    
    $password_hash = $user['password_hash'];
    
    return password_verify($password, $password_hash);

   
}

function create_user($user) {

    global $database;

    $query = "INSERT INTO user (username, password)"
            . "VALUES (:username, :password)" ;
    
    // prepare the query
    $statement = $database->prepare($query);

    // Binding the value into our form name
    $statement->bindValue(":username", $user->get_username());
    $statement->bindValue(":password", $user->get_password());
    

    //run the query
    $statement->execute();
    $statement->closeCursor();
} 

