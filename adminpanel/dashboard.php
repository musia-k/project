<?php
    require 'session.php';

    $page = "dashboard";
    $error = htmlentities($_GET['error']);
    $id = htmlentities($_GET['id']);

    $sql = "
        SELECT
            g.id AS id,
            g.good AS brand,
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
    ";
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
        .container.mx-auto {
            min-width: 938px;
        }
        table {
            margin: auto;
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
                    <!-- <th>Type</th> -->
                    <th>Category</th>
                    <th>Picture</th>
                    <th>Feature</th>
                    <th>Price</th>
                    <th>Timestamp</th>
                    <th>More/Update</th>
                    <th>Delete</th>
                </tr>
                <?php 
                    if($result ->num_rows > 0) {
                        while($row = $result ->fetch_assoc()){
                    ?>
                    <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["brand"]; ?></td>
                    <!-- <td><?php /* echo $row["type"]; */ ?></td> -->
                    <td><?php echo $row["category"]; ?></td>
                    <td><img src="<?php echo '../img/goods/'.$row["picturename"]; ?>"/></td>
                    <td><img src="<?php echo '../img/goods/'.$row["featurename"]; ?>"/></td>
                    <td><?php echo $row["price"]; ?></td>
                    <td><?php echo $row["timestamp"]; ?></td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>">More/Update</a></td>
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