<?php
    include("config.php");
    session_start();
    if (isset($_SESSION['login_user'])){
        header("location: dashboard.php");
        die();
    }
    else {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            // username and password sent from form 
            
            $myusername = mysqli_real_escape_string($conn,$_POST['username']);
            $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
            
            $sql = "SELECT id FROM webadmin WHERE username = '$myusername' and password = '$mypassword'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $active = $row['active'];
            
            $count = mysqli_num_rows($result);
            
            // If result matched $myusername and $mypassword, table row must be 1 row
            
            if($count == 1) {
                $_SESSION['login_user'] = $myusername;
                header("location: dashboard.php");
                die();
            }else {
                $error = "Your Login Name or Password is invalid";
                echo $_SESSION['login_user'];
            }
        }
   }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script type="text/javascript">
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script> -->
    <title>Document</title>
</head>
<body>
<?php /* echo htmlspecialchars($_SERVER["PHP_SELF"]); */?>
    <form action="" method="post">
    <table>
        <tr>
            <td>
                <label for="username">Username: </label>
            </td>
            <td>
                <input type="text" name="username" id="username">
            </td>
        </tr>
        <tr>
            <td>
                <label for="password">Password: </label>
            </td>
            <td>
                <input type="password" name="password" id="password">
            </td>
        </tr>
        <tr>
            <td> </td>
            <td style="text-align: right;">
                <input type="submit" value="Log In">
            </td>
        </tr>
    
    </table>
    
    </form>
    <?php echo $error; ?>
</body>
</html>