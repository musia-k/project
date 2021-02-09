<?php include 'db.php' ;

$baseurl = "http://";
$baseurl .= $_SERVER['HTTP_HOST'];
$baseurl .= str_replace("/create.php", "", $_SERVER['PHP_SELF']);

$fname= $_POST['fname'];
$lname= $_POST['lname'];
$city= $_POST['city'];
$groupid= $_POST['groupid'];
$sql="insert into studentsinfo (fname, lname, city, groupid)
values('$fname', '$lname', '$city', '$groupid')";

if($_SERVER ['REQUEST_METHOD'] == 'POST'){
    
    if (!empty($fname) && !empty($lname) && !empty($city)){
        
        if($conn->query($sql) === TRUE) {
            echo "New record added";
            echo "<a href='update.php' class='top'>Home </a>";
        }
        else
        {
            echo "ERROR: " .$sql. "<br>" . $conn->error;
        }
        $conn->close();
    }
    else {
        
        $error = "Error: Fill all the fields";
        
        //  To redirect form on a particular page
        header("Location:$baseurl/form.php?error=$error");
        die();
    
    }
}



?>