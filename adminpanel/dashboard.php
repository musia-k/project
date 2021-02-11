<?php
    /* session_start();
    echo $_SESSION['login_user'];
    if (!isset($_SESSION['login_user'])){
        header('Location: login.php');
        die();
    } */
    include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    WELCOME
    <a href="logout.php">logout</a>
</body>
</html>