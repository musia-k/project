<?php
    require 'session.php';

    $brand=$type=$category=$price=$picturepath=$featurepath="";
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
            $featurepath = $target_dir . basename($_FILES['feature']['name']);
            $picturepath = $target_dir . basename($_FILES['picture']['name']);
            $picturename = basename($_FILES['picture']['name']);
            $featurename = basename($_FILES['feature']['name']);

            $sql = "INSERT INTO cars (`brand`, `type`, `category`, `picturename`, `featurename`, `picturepath`, `featurepath`, `price`) VALUES ('$brand', '$type', '$category', '$picturename', '$featurename', '$picturepath', '$featurepath', '$price')";

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
                    array_push($error, "Sorry, there was an error while uploading your file.");
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
    <title>Insert a New Car</title>
</head>
<body>
    <a href="dashboard.php">Dashboard</a>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <label for="brand">Brand: </label>
                </td>
                <td>
                    <input type="text" name="brand" id="brand">
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
            <tr>
                <td></td>
                <td style="text-align: right;">
                    <input type="submit" name="insert" value="Insert New Record">
                </td>
            </tr>
        </table>
    </form>

    <?php
    foreach ($error as $p) {
        echo $p."<br>";
    }
    ?>
</body>
</html>