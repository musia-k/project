<?php
$servername="localhost";
$username="root";
$password="Mysq123!";
$dbname ="project2";
// creating connection 
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
    die("Connection failed: ".$conn->connect_error);
?>
