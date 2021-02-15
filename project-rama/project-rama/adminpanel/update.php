<?php
include 'config.php';
include 'session';

// get handling
$id = $_GET['id'];
$result = mysqli_query($conn,"SELECT * FROM cars WHERE id='$id'");
$row= mysqli_fetch_array($result);

// post handling
$target_dir = $_SERVER['DOCUMENT_ROOT'].'/project2/uploads/';
$uploadOk = 1;
$error = [];

// jpg, png
$allowedImageExtension = [2, 3]; 

// check picture
$checkPicture = exif_imagetype($_FILES['picture']['tmp_name']);

// check feature
$checkFeature = exif_imagetype($_FILES['feature']['tmp_name']);

if (isset($_POST['insert'])){
    if (empty($_POST['brand']) || empty($_POST['type']) || empty($_POST['category']) || empty($_POST['price']) || empty($_FILES['feature']['size']) || empty($_FILES['picture']['size'])) {
        array_push($error, "Please fill all the fields");
        $uploadOk = 0;
    }
    else { 
        $brand = $_POST['brand'];
        $type = $_POST['type'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $feature = $target_dir . basename($_FILES['feature']['name']);
        $picture = $target_dir . basename($_FILES['picture']['name']);

        $sql = "INSERT INTO cars (`brand`, `type`, `category`, `pics`, `feature`, `price`) VALUES ('$brand', '$type', '$category', '$picture', '$feature', '$price')";

        // picture extension validation
        if (in_array($checkPicture, $allowedImageExtension)){
            $uploadOk = 1;
        }
        else {
            $uploadOk = 0;
            array_push($error, "Only jpg, jpeg and png extensions are allowed");
        }

        // feature extension validation
        if (in_array($checkFeature, $allowedImageExtension)){
            $uploadOk = 1;
        }
        else {
            $uploadOk = 0;
            array_push($error, "Only jpg, jpeg and png extensions are allowed");
        }

        // picture and feature size limit
        if ($_FILES['picture']['size']<(2*1024*1024) && $_FILES['feature']['size']<(2*1024*1024)){
            $uploadOk = 1;
        }
        else {
            $uploadOk = 0;
            array_push($error, "file size limit is 2MB");
        }

        // if picture exist
        if (file_exists($picture) || file_exists($feature)){
            array_push($error, "sorry, file already exist");
            $uploadOk = 0;
        }
        else {
            // upload picture
            if (move_uploaded_file($_FILES['picture']['tmp_name'], $picture)) {
                $uploadOk = 1;
            } else {
                array_push($error, "Sorry, there was an error uploading your file.");
                $uploadOk = 0;
            }

            // upload feature
            if (move_uploaded_file($_FILES['feature']['tmp_name'], $feature)) {
                $uploadOk = 1;
            } else {
                array_push($error, "Sorry, there was an error uploading your file.");
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
                unlink($picture);
                unlink($feature);
                array_push($error, "submission failed");
                array_push($error, "ERROR: " .$sql. "<br>" . $conn->error);
                array_push($error, $picture);
                array_push($error, $feature);
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
    <style>
        main {
            margin: 15px auto 0 auto;
        }
        img {
            max-height: 150px;
            max-width: 170px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Update Car</title>
</head>
<body>
    <div class="container mx-auto">
        <?php include 'navbar.php'; ?>
    
        <main>
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <label for="brand">Brand: </label>
                        </td>
                        <td>
                            <input type="text" name="brand" id="brand" value="<?php echo $row['brand']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="type">Type:</label>
                        </td>
                        <td>
                            <input type="text" name="type" id="type" value="<?php echo $row['type']; ?>">
                        </td>
                    </tr>
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
                            <label for="category">Category:</label>
                        </td>
                        <td>
                            <select name="category">
                                <option value="SUV">SUV</option>
                                <option value="ECONOM">ECONOM</option>
                                <option value="OTHER">OTHER</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="feature">Feature:</label>
                        </td>
                        <td>
                            <img src="<?php echo '../uploads/'.$row["featurename"]; ?>"/>
                        </td>
                        <td>
                            <a href="#">Update Feature</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="picture">Picture:</label>
                        </td>
                        <td>
                            <img src="<?php echo '../uploads/'.$row["picturename"]; ?>"/>
                        </td>
                        <td>
                            <a href="#">Update Picture</a>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: right;">
                            <input type="submit" name="insert" value="Insert New Record">
                        </td>
                    </tr>
                </table>
            </form>
        </main>
    
        
    <?php foreach ($error as $p) {
    echo $p."<br>";
    }
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>