<?php

class User {

    private $email_address, $username, $password, $id;

    public function __construct($email_address, $username, $password, $id = 0) {
        $this->set_email_address($email_address);
        $this->set_username($username);
        $this->set_password($password);
        $this->set_id($id);
    }

    public function get_id() {
        return $this->id;
    }

    public function get_email_address() {
        return $this->email_address;
    }

    public function get_username() {
        return $this->username;
    }

    public function get_password() {
        return $this->password;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function set_email_address($email_address) {
        $this->email_address = $email_address;
    }

    public function set_username($username) {
        $this->username = $username;
    }

    public function set_password($password) {
        $this->password = $password;
    }

    function create_user($user) {

        global $database;

        $query = "INSERT INTO user (email_address, username, password)"
                . "VALUES (:email_address, :username, :password)";

        // prepare the query
        $statement = $database->prepare($query);

        // Binding the value into our form name

        $statement->bindValue(":email_address", $user->get_email_address());
        $statement->bindValue(":username", $user->get_username());
        $statement->bindValue(":password", $user->get_password());

        //run the query
        $statement->execute();
        $statement->closeCursor();
    }

}
