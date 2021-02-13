<?php 
include "config.php";
include 'session.php';
$id = htmlentities($_GET['id']);

$sql = "DELETE FROM cars WHERE id='$id'";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['delete'])){
        if($conn->query($sql)){
            header("location: dashboard.php");
        }
        else {
            $error = "Record Not Deleted";
            header("location: dashboard.php?error=$error&id=$id");
        }
        $conn-> close();
        die();
    }
    if (isset($_POST['cancel'])){
        header("location: dashboard.php");
    }
}

?>
<html>
You are about to delete a row from the database <br>
<form action="" method="post">
    <table>
        <td><input type="submit" name="delete" value="Delete"></td>
        <td><input type="submit" name="cancel" value="Cancel"></td>
    </table>
</form>
</html>