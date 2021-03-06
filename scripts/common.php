<?php

define('DB_HOST', 'localhost:3307');
define('DB_USER', 'team3');
define('DB_PASSWORD', 'EfVL534G');
define('DB_NAME', 'db');


function connectDB() {
    $errorMessage = 'Cannot connect to the database';
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$conn)
        throw new Exception($errorMessage);
    else {
        $query = $conn->query('set names utf8');
        if (!$query)
            throw new Exception($errorMessage);
        else
            return $conn;
    }
}
