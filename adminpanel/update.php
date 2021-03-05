<?php
include 'session.php';

// get handling
$id = $_GET['id'];
$sql = "
    SELECT
        g.id AS id,
        g.good AS name,
        c.category AS category,
        g.price AS price,
        g.timestamp AS timestamp,
        g.photo AS picturename,
        g.feature AS featurename
    FROM
        goods AS g
    INNER JOIN categories AS c
    ON
        g.category_id = c.id
    WHERE
        g.id = '$id'
    ";
$result = $conn->query($sql);
$row= mysqli_fetch_array($result);

// post handling
$uploadOk = 1;
$error = $_GET['err'];

if (isset($_POST['update'])){
    if (empty($_POST['name'])/*  || empty($_POST['type']) */ || empty($_POST['category']) || empty($_POST['price']) || empty($_POST['additional'])) {
        $error = "Please fill all the fields";
        $uploadOk = 0;            
    }
    else { 
        $name = $_POST['name'];
        /* $brand = $_POST['brand']; */
        /* $type = $_POST['type']; */
        $category = $_POST['category'];
        $price = $_POST['price'];
        $additional = $_POST['additional'];

        /* $sql = "UPDATE cars SET brand='$brand', `type`='$type', additional='$additional', category='$category', price='$price' where id='$id'"; */

        $sql = "UPDATE goods SET good='$name', additional='$additional', category='$category', price='$price' where id='$id'";

        // if all files uploaded insert to DB
        if ($uploadOk == 0){
            $err = "error, your data is not submitted";
        }
        else {
            if ($conn-> query($sql)){
                $err = "Your data have been updated";
            }
            else {
                $err = "submission failed";
            }
            $conn-> close();
            header("location: update.php?id=$id&err=$err");
            die();
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
    <style>
        .container {
            min-width: 516px;
            min-height: 900px;
        }
        main {
            margin: 15px auto 0 auto;
            
        }
        .wrapper-form {
            position: relative;
            margin-top: 100px;
            padding: 50px;
            max-width: 1040px;
            background-color: rgba(196, 196, 196, 0.3);
        }
        .title-header {
            position: absolute;
            top: -70px;
            left: 0;
            font-style: normal;
            font-weight: bold;
            font-size: 32px;
            color: #E5E5E5;
            text-shadow: 3px 4px 4px #000000;
        }
        img {
            max-height: 240px;
            max-width: 280px;
        }
        table label {
            width: 110px;
        }
        tr>td:last-child {
            min-width: 285px;
            width: 100%;
        }
        th, td {
            padding: 5px;
        }
        input {
            width: 100%;
        }
        input[type=submit] {
            width: fit-content;
        }
        select {
            width: 100%;
        }
        textarea {
            width: 100%;
        }
        .submit-btn {
            text-align: center;
            margin-top: 30px;
        }
        .submit-btn input[type="submit"] {
            color: white;
            border: none;
            padding: 13px 35px;
            font-size: 18px;
            font-weight: bold;
            background-color: rgba(139, 140, 181, 1);
        }
        /* nav */
        .navbar {
            width: 100%;
            background-color: rgba(90, 91, 149, 0.7);
        }
        .navbar a {
            color: white;
        }
        a.navbar-brand:hover {
            color: white;
        }
        a.nav-link:not(.nav-link.active):hover {
            color: #9affff;
            position: relative;
            bottom: 2px;
        }
        .nav-link.active {
            color: #d9d9d9;
        }
        /* end nav */
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Update Car</title>
</head>
<body>
    <div class="container mx-auto">
        <?php include 'navbar.php'; ?>
    
        <main>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="wrapper-form mx-auto">
                    <div class="title-header">
                        UPDATE RECORD
                    </div>
                    <table>
                        <tr>
                            <td>
                                <label for="name">Name: </label>
                            </td>
                            <td>
                                <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>">
                            </td>
                        </tr>
                        <!-- <tr>
                            <td>
                                <label for="brand">Brand: </label>
                            </td>
                            <td>
                                <input type="text" name="brand" id="brand" value="<?php /* echo $row['brand_id']; */ ?>">
                            </td>
                        </tr> -->
                        <!-- <tr>
                            <td>
                                <label for="type">Type:</label>
                            </td>
                            <td>
                                <input type="text" name="type" id="type" value="<?php /* echo $row['type']; */ ?>">
                            </td>
                        </tr> -->
                        <tr>
                            <td>
                                <label for="price">Price:</label>
                            </td>
                            <td>
                                <input type="number" name="price" id="price" min=0 value="<?php echo $row['price']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="additional">Additional Info: </label>
                            </td>
                            <td>
                                <textarea name="additional" id="additional" rows="4"><?php echo $row['additional']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="category">Category:</label>
                            </td>
                            <td>
                                <select name="category">
                                    <?php
                                        if ($row['category'] == "SUV"){
                                    ?>
                                    <option value="2">SUV</option>
                                    <option value="1">ECONOM</option>
                                    <option value="4">BUSINESS</option>
                                    <option value="3">CONVERTIBLE</option>
                                    <?PHP
                                        }
                                        elseif ($row['category'] == "Econom") {
                                    ?>
                                    <option value="1">ECONOM</option>
                                    <option value="2">SUV</option>
                                    <option value="4">BUSINESS</option>
                                    <option value="3">CONVERTIBLE</option>
                                    <?php
                                        }
                                        elseif ($row['category'] == "Business") {
                                    ?>
                                    <option value="4">BUSINESS</option>
                                    <option value="1">ECONOM</option>
                                    <option value="2">SUV</option>
                                    <option value="3">CONVERTIBLE</option>
                                    <?php
                                        }
                                        elseif ($row['category'] == "Convertible") {
                                    ?>
                                    <option value="3">CONVERTIBLE</option>
                                    <option value="1">ECONOM</option>
                                    <option value="2">SUV</option>
                                    <option value="4">BUSINESS</option>
                                    <?php
                                        }
                                        else {
                                    ?>
                                    <option value="#">error</option>
                                    <option value="2">SUV</option>
                                    <option value="1">ECONOM</option>
                                    <option value="4">BUSINESS</option>
                                    <option value="3">CONVERTIBLE</option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="feature">Feature:</label>
                            </td>
                            <td>
                                <img src="<?php echo '../img/goods/'.$row["featurename"]; ?>"/>
                            </td>
                            <!-- <td>
                                <a href="#">Update Feature</a>
                            </td> -->
                        </tr>
                        <tr>
                            <td>
                                <label for="picture">Picture:</label>
                            </td>
                            <td>
                                <img src="<?php echo '../img/goods/'.$row["picturename"]; ?>"/>
                            </td>
                            <!-- <td>
                                <a href="#">Update Picture</a>
                            </td> -->
                        </tr>
                        
                    </table>
                </div>
                <div class="submit-btn">
                    <input type="submit" name="update" value="Update Record">
                </div>
            </form>
        </main>
    
        
    <?php echo $error;
    
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>