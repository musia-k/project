<html>
<head>
    <title><?php echo $data['title'] ?></title>
</head>

<body style="width: 98%">
<div style="font-family: Arial; font-size: 16px; width: 100%; padding: 5px 0">
    <div><b>Thanks for picking our company!</b></div>
    <div>Your order №<?php echo $data['order_id'] ?></div>
    <div style="margin: 20px 0">
        <b>Overall info:</b>
        <br />
        Name: <?php echo $data['name']; ?><br />
        Email: <?php echo $data['email']; ?><br />
        Mobile Phone: <?php echo $data['phone']; ?><br />
        Adress: <?php echo $data['address']; ?><br />
        Message: <?php echo $data['message']; ?>
    </div>
    <div ><b>Order:</b></div>
    <table cellspacing="0" style="border: none; width: 100%; font-size: 14px">
        <thead>
            <th style="text-align: left">id of the car</th>
            <th style="text-align: left">Name</th>
            <th style="text-align: left">Price</th>
            <th style="text-align: left">Amount</th>
        </thead>
        <tbody>
            <?php
            foreach($cart as $cartItem) {
                echo sprintf(
                    "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
                    $cartItem['id'],
                    $cartItem['name'],
                    $cartItem['price'],
                    $cartItem['count']
                );
            }
            ?>
        </tbody>
    </table>
    <div style="margin: 20px 0">
        Delivery: <?php echo $data['delivery_type']; ?><br />
        Overall sum of delivery: <?php echo $data['delivery_summa']; ?> $<br />
        Overall price: <?php echo $data['full_summa']; ?> $<br />
    </div>
</div>
</body>
</html>