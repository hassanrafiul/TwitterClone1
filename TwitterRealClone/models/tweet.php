<?php

class Tweet {

    private $user_id, $textarea, $timestamp, $id;

    public function __construct($user_id, $textarea, $timestamp, $id = 0) {
        $this->set_user_id($user_id);
        $this->set_textarea($textarea);
        $this->set_timestamp($timestamp);
        $this->set_id($id);
    }

    public function get_id() {
        return $this->id;
    }

    public function get_user_id() {
        return $this->user_id;
    }

    public function get_textarea() {
        return $this->textarea;
    }

    public function get_timestamp() {
        return $this->timestamp;
    }

    public function set_id($id): void {
        $this->id = $id;
    }

    public function set_user_id($user_id) {
        $this->user_id = $user_id;
    }

    public function set_textarea($textarea) {
        $this->textarea = $textarea;
    }

    public function set_timestamp($timestamp) {
        $this->timestamp = $timestamp;
    }

    function list_tweet() {

        global $database;

        $query = 'SELECT * FROM tweet';

        // prepare the query
        $statement = $database->prepare($query);

        //run the query
        $statement->execute();

        // fetch the data
        $tweets = $statement->fetchAll();

        $statement->closeCursor();

        $tweets_array = array();

        foreach ($tweets as $tweet) {

            $tweets_array[] = new Tweet($tweet['id'], $tweet['user_id'], $tweet['textarea'],
                    $tweet['timestamp']);
        }
        return $tweets_array;
    }

    function add_tweet($tweet) {

        global $database;

        $query = "INSERT INTO tweet ( user_id, textarea)"
                . "VALUES (:user_id, :textarea)";

        // prepare the query
        $statement = $database->prepare($query);

        // Binding the value into our form name
        $statement->bindValue(":user_id", $tweet->get_user_id());
        $statement->bindValue(":textarea", $tweet->get_textarea());

        //run the query
        $statement->execute();
        $statement->closeCursor();
    }

}
