<?php
    require "config.php";
    require 'session.php';

    $error = htmlentities($_GET['error']);
    $id = htmlentities($_GET['id']);

    $sql = "select * from cars";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        main {
            margin: 15px auto 0 auto;
        }
        img {
            max-height: 100px;
            max-width: 150px;
        }
    </style>
    <title>Dashboard</title>
</head>
<body>
    <div class="container mx-auto">
    <?php include 'navbar.php' ?>

    <main>
        <form action="" method="post">
            <table border="1" cellpadding="5">
                <tr>
                    <th>ID</th>
                    <th>Brand</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Picture</th>
                    <th>Feature</th>
                    <th>Price</th>
                    <th>Timestamp</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                <?php 
                    if($result ->num_rows > 0) {
                        while($row = $result ->fetch_assoc()){
                    ?>
                    <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["brand"]; ?></td>
                    <td><?php echo $row["type"]; ?></td>
                    <td><?php echo $row["category"]; ?></td>
                    <td><img src="<?php echo '../uploads/'.$row["picturename"]; ?>"/></td>
                    <td><img src="<?php echo '../uploads/'.$row["featurename"]; ?>"/></td>
                    <td><?php echo $row["price"]; ?></td>
                    <td><?php echo $row["timestamp"]; ?></td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                    <?php if($id == $row['id']){echo "<td>".$error."</td>";} ?>
                    </tr>

                    <?php 
                    }
                    }
                    else
                    {
                        echo "no results";
                    }
                    $conn->close();
                ?>
            </table>
        </form>
    </main>    
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>