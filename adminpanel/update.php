<?php
include 'session.php';

// get handling
$id = $_GET['id'];
$result = mysqli_query($conn,"SELECT * FROM cars WHERE id='$id'");
$row= mysqli_fetch_array($result);

// post handling
$uploadOk = 1;
$error = $_GET['err'];

if (isset($_POST['update'])){
    if (empty($_POST['brand']) || empty($_POST['type']) || empty($_POST['category']) || empty($_POST['price']) || empty($_POST['additional'])) {
        $error = "Please fill all the fields";
        $uploadOk = 0;            
    }
    else { 
        $brand = $_POST['brand'];
        $type = $_POST['type'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $additional = $_POST['additional'];

        $sql = "UPDATE cars SET brand='$brand', `type`='$type', additional='$additional', category='$category', price='$price' where id='$id'";

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
        main {
            margin: 15px auto 0 auto;
        }
        img {
            max-height: 215px;
            max-width: 294px;
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
                                <option value="SUV">SUV</option>
                                <option value="ECONOM">ECONOM</option>
                                <option value="BUSINESS">BUSINESS</option>
                                <option value="CONVERTIBLE">CONVERTIBLE</option>
                                <option value="OTHER">OTHER</option>
                                <?PHP
                                    }
                                    elseif ($row['category'] == "ECONOM") {
                                ?>
                                <option value="ECONOM">ECONOM</option>
                                <option value="SUV">SUV</option>
                                <option value="BUSINESS">BUSINESS</option>
                                <option value="CONVERTIBLE">CONVERTIBLE</option>
                                <option value="OTHER">OTHER</option>
                                <?php
                                    }
                                    elseif ($row['category'] == "BUSINESS") {
                                ?>
                                <option value="BUSINESS">BUSINESS</option>
                                <option value="ECONOM">ECONOM</option>
                                <option value="SUV">SUV</option>
                                <option value="CONVERTIBLE">CONVERTIBLE</option>
                                <option value="OTHER">OTHER</option>
                                <?php
                                    }
                                    elseif ($row['category'] == "CONVERTIBLE") {
                                ?>
                                <option value="CONVERTIBLE">CONVERTIBLE</option>
                                <option value="ECONOM">ECONOM</option>
                                <option value="SUV">SUV</option>
                                <option value="BUSINESS">BUSINESS</option>
                                <option value="OTHER">OTHER</option>
                                <?php
                                    }
                                    else {
                                ?>
                                <option value="OTHER">OTHER</option>
                                <option value="SUV">SUV</option>
                                <option value="ECONOM">ECONOM</option>
                                <option value="BUSINESS">BUSINESS</option>
                                <option value="CONVERTIBLE">CONVERTIBLE</option>
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
                            <input type="submit" name="update" value="Update Record">
                        </td>
                    </tr>
                </table>
            </form>
        </main>
    
        
    <?php echo $error;
    
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>