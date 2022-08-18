<?php

class Tweet {

    private $id, $textarea, $user_id, $image, $timestamp;

    public function __construct($textarea, $user_id, $image, $timestamp, $id = 0) {

        $this->set_textarea($textarea);
        $this->set_user_id($user_id);
        $this->set_image($image);
        $this->set_timestamp($timestamp);
        $this->id = $id;
    }

    public function get_id() {
        return $this->id;
    }

    public function get_textarea() {
        return $this->textarea;
    }

    public function get_user_id() {
        return $this->user_id;
    }

    public function get_image() {
        return $this->image;
    }

    public function get_timestamp() {
        return $this->timestamp;
    }

    public function set_id($id): void {
        $this->id = $id;
    }

    public function set_textarea($textarea) {
        $this->textarea = $textarea;
    }

    public function set_user_id($user_id) {
        $this->user_id = $user_id;
    }

    public function set_image($image) {
        $this->image = $image;
    }

    public function set_timestamp($timestamp) {
        $this->timestamp = $timestamp;
    }
    
    
    function list_tweet(){
        global $database;
        
        $query = 'SELECT textarea, user_id, image, timestamp, id FROM tweet';
        
        $statement = $database->prepare($query);
        
        $statement->execute();
        
        $list_tweet = $statement->fetchALL();
        
        $statement->closeCursor();
        
        $list_tweet_array = array();
        
        
        foreach($list_tweet as $tweet){
            
            $list_tweet_array[]= new Tweet($tweet['textarea'],
                    $tweet['user_id'], $tweet['image'], $tweet['timestamp'], $tweet['id']);
        }
        return $list_tweet_array;
                
    }
    
    function add_tweet($tweet){
        
        
        global $database;
        
        $query = "INSERT INTO tweet ( textarea, user_id, image) "
                . "VALUES (:textarea, :user_id, :image)" ;
        
        $statement = $database->prepare($query);
        
        
        $statement->bindValue(":textarea", $tweet->get_textarea());
        $statement->bindValue(":user_id", $tweet->get_user_id());
        $statement->bindValue(":image", $tweet->get_image());
        

        $statement->execute();

        $statement->closeCursor();

    }
    function delete_tweet($tweet){
        
        
        global $database;
        
        $query = ' delete from tweet where id = :id ';
        
        $statement = $database->prepare($query);
        
      
        $statement->bindValue(":id", $tweet->get_id());
        

        $statement->execute();

        $statement->closeCursor();

    }
    
}
