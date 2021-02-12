<?php 
require "config.php";
require 'session.php';
$id = htmlentities($_GET['id']);

$sql = "DELETE FROM cars WHERE id='$a'";
$query = mysqli_query($conn, $sql);

if($query){
    // echo "Record Deleted with id: $a <br>";
    // echo "<a href='update.php'> Check your updated List </a>";
    // if you want to redirect to update page after updating
    header("location: dashboard.php");
}
else {
    $error = "Record Not Deleted";
    header("location: dashboard.php?error=$error&id=$id");
}

?>