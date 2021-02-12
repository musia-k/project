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
    <style>
        ul {
            display: inline;
            
        }
        ul li {
            display: inline;
            
        }
        ul li a {
            text-decoration: none;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <ul>
        <li><a href="insert.php">Insert a New Car</a></li>
        <li></li>
        <li><a href="logout.php">logout</a></li>
    </ul>
    
    <form action="" method="post">
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Type</th>
            <th>Category</th>
            <th>Feature</th>
            <th>Price</th>
            <th>Timestamp</th>
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
            <td><?php echo $row["feature"]; ?></td>
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
</body>
</html>