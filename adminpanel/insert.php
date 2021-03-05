<?php
    require 'session.php';
    
    $page = "insert";
    $brand=$type=$category=$price=$picturepath=$featurepath="";
    $target_dir = '../img/goods/';
    $uploadOk = 1;
    $error = [];

    // jpg, png
    $allowedImageExtension = [2, 3]; 

    // check picture
    $checkPicture = exif_imagetype($_FILES['picture']['tmp_name']);

    // check feature
    $checkFeature = exif_imagetype($_FILES['feature']['tmp_name']);

    if (isset($_POST['insert'])){
        if (empty($_POST['brand']) || empty($_POST['type']) || empty($_POST['category']) || empty($_POST['price']) || empty($_POST['additional']) || empty($_FILES['feature']['size']) || empty($_FILES['picture']['size'])) {
            array_push($error, "Please fill all the fields");
            $uploadOk = 0;            
        }
        else { 
            // declaring variables for database query
            $name = htmlentities($_POST['name'], ENT_QUOTES);
            $brand = htmlentities($_POST['brand'], ENT_QUOTES);
            $type = htmlentities($_POST['type'], ENT_QUOTES);
            $category = htmlentities($_POST['category'], ENT_QUOTES);
            $price = htmlentities($_POST['price'], ENT_QUOTES);
            $additional = htmlentities($_POST['additional'], ENT_QUOTES);
            $featurepath = $target_dir . basename($_FILES['feature']['name']);
            $picturepath = $target_dir . basename($_FILES['picture']['name']);
            $picturename = basename($_FILES['picture']['name']);
            $featurename = basename($_FILES['feature']['name']);

            $sql = "INSERT INTO goods (`good`, `brand_id`, `type`, `category_id`, `additional`, `photo`, `feature`, `price`) VALUES ('$name', '$brand', '$type', '$category', '$additional', '$picturename', '$featurename', '$price')";

            // picture extension validation
            if (in_array($checkPicture, $allowedImageExtension)){
                $uploadOk = 1;
            }
            else {
                $uploadOk = 0;
                array_push($error, "Only jpg, jpeg and png extensions are allowed");
            }

            // feature extension validation
            if ($uploadOk != 0 && in_array($checkFeature, $allowedImageExtension)){
                $uploadOk = 1;
            }
            else {
                $uploadOk = 0;
                array_push($error, "Only jpg, jpeg and png extensions are allowed");
            }

            // picture and feature size limit
            if ($uploadOk != 0 && $_FILES['picture']['size']<(2*1024*1024) && $_FILES['feature']['size']<(2*1024*1024)){
                $uploadOk = 1;
            }
            else {
                $uploadOk = 0;
                array_push($error, "file size limit is 2MB");
            }

            // if picture exist
            if (file_exists($picturepath) || file_exists($featurepath)){
                array_push($error, "sorry, file already exist");
                $uploadOk = 0;
            }
            else {
                // upload pictures
                if (move_uploaded_file($_FILES['picture']['tmp_name'], $picturepath) && move_uploaded_file($_FILES['feature']['tmp_name'], $featurepath)) {
                    $uploadOk = 1;
                } else {
                    if (!is_writable($target_dir)){
                        array_push($error, "The path is not writtable, contact admin!");
                    }
                    else{
                        array_push($error, "Sorry, there was an error while uploading your file.");
                    }
                    $uploadOk = 0;
                }
            }

            // if all files uploaded insert to DB
            if ($uploadOk == 0){
                array_push($error, "error, your data is not submitted");
            }
            else {
                if ($conn-> query($sql)){
                    $error = ["Your data have been Submitted"];
                }
                else {
                    unlink($picturepath);
                    unlink($featurepath);
                    array_push($error, "submission failed");
                    array_push($error, "ERROR: " .$sql. "<br>" . $conn->error);
                    array_push($error, $picturepath);
                    array_push($error, $featurepath);
                }
                $conn-> close();
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .container {
            min-width: 516px;
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
            max-height: 100px;
            max-width: 150px;
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
            margin-top: 50px;
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
    <title>Insert a New Car</title>
</head>
<body>
    <div class="container mx-auto">
    <?php include 'navbar.php' ?>
        <main>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="wrapper-form mx-auto">
                    <div class="title-header">
                        NEW RECORD
                    </div>
                    <div class="row">
                        <div class="col-12 col-md">
                            <table>
                                <tr>
                                    <td>
                                        <label for="name">Name: </label>
                                    </td>
                                    <td>
                                        <input type="text" name="name" id="name">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="brand">Brand: </label>
                                    </td>
                                    <td>
                                        <?php
                                        $brand_query = "SELECT * FROM brands";
                                        $brand_result = $conn->query($brand_query);
                                        if ($brand_result) {
                                            if ($brand_result->num_rows > 0){
                                                echo '<select name="brand">';
                                                while($row = $brand_result ->fetch_assoc()){
                                                    echo '<option value="'. $row['id'] .'">'.$row['brand'].'</option>';
                                                }
                                                echo '</select>';
                                            }
                                            else {
                                                echo "No value";
                                            }
                                        }
                                        else {
                                            echo '<option value="#">'. $conn->error .'</option>';
                                        }
                                        $conn->close();
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="type">Type:</label>
                                    </td>
                                    <td>
                                        <input type="text" name="type" id="type">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="price">Price:</label>
                                    </td>
                                    <td>
                                        <input type="number" name="price" id="price" min=0>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="category">Category:</label>
                                    </td>
                                    <td>
                                        <select name="category">
                                            <option value="1">ECONOM</option>
                                            <option value="2">SUV</option>
                                            <option value="3">CONVERTIBLE</option>
                                            <option value="4">BUSINESS</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="feature">Feature:</label>
                                    </td>
                                    <td>
                                        <input type="file" name="feature" id="feature">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="picture">Picture:</label>
                                    </td>
                                    <td>
                                        <input type="file" name="picture" id="picture">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12 col-md">
                            <table>
                            <tr>
                                    <td>
                                        <label for="additional">Additional Info: </label>
                                    </td>
                                    <td>
                                        <textarea name="additional" id="additional" rows="4"></textarea>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 submit-btn">
                        <input type="submit" name="insert" value="Insert a Record">
                    </div>                                
                </div>
            </form>
        </main>
    
        <?php
    foreach ($error as $p) {
        echo $p."<br>";
    }
    ?>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>