<?php 
include "config.php";
include 'session.php';
$id = htmlentities($_GET['id']);

$sql = "DELETE FROM cars WHERE id='$id'";

if($conn->query($sql)){
    header("location: dashboard.php");
}
else {
    $error = "Record Not Deleted";
    header("location: dashboard.php?error=$error&id=$id");
}
$conn-> close();
die();
?>