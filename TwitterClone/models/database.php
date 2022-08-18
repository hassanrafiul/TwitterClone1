<?php
//database server type, loactaion, database name
$data_source_name = 'mysql:host=localhost;dbname=twitter';
$username = 'root';
$password = '';

$database = new PDO($data_source_name, $username, $password);