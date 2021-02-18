<?php
    include 'session.php';

    $error = "";

    if (isset($_POST['submit'])){
        $car_id = htmlentities($_POST['car_id'], ENT_QUOTES);
        $review = htmlentities($_POST['review'], ENT_QUOTES);
        $sql = "INSERT INTO `car_reviews`(`review`, `car_id`) VALUES ('$review', '$car_id')";

        if($conn->query($sql)){
            $error = "Review has been submitted";
        }
        else {
            $error = "There was an error when submitting your review";
            $error .= "<br>". $sql . $conn->error;
        }
        $conn->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Temporary Insert Review</title>
    </head>
    <body>
        <form action="" method="post">
            <table>
                <tr>
                    <td>
                        <label for="car_id">Car ID: </label>
                    </td>
                    <td>
                        <input type="number" name="car_id" id="car_id" min="0">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="review">Review: </label>
                    </td>
                    <td>
                        <textarea name="review" id="review" cols="30" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align: right;"> <input type="submit" name="submit" value="Add Review"></td>
                </tr>
            </table>
            <?php echo $error; ?>
        </form>
    </body>
</html>