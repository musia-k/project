<?php

// needed constants
define('DB_HOST', 'localhost:3307');
define('DB_USER', 'team3');
define('DB_PASSWORD', 'EfVL534G');
define('DB_NAME', 'default_team3');

define('EMAIL_ADMIN', 'reservations@rmr_cars.com');
define('EMAIL_FROM_NAME', 'RMR Renting company');
define('SITE', 'rmr.fi');


function connectDB() {
    $errorMessage = 'Cannot connect to DB';
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$conn)
        throw new Exception($errorMessage);
    else {
        $query = $conn->query('set names utf8');
        if (!$query)
            throw new Exception($errorMessage);
        else
            return $conn;
    }
}

function getParam($param, $conn, $default = '') {
    return (isset($_POST[$param])) ? mysqli_real_escape_string($conn, $_POST[$param]) : $default;
}

function getData($conn) {
    return array(
        'name' => getParam('name', $conn, 'noname'),
        'email' => getParam('email', $conn, 'unknown email'),
        'phone' => getParam('phone', $conn),
        'address' => getParam('address', $conn),
        'message' => getParam('message', $conn),
        'delivery_type' => getParam('delivery_type', $conn),
        'delivery_summa' => getParam('delivery_summa', $conn),
        'full_summa' => getParam('full_summa', $conn),
        'cart' => isset($_POST['cart']) ? stripslashes($_POST['cart']) : '[]'
    );
}

// add client
function addClient($data, $conn) {
    $query = sprintf(
        "insert into clients (`name`, `email`, `phone`) values ('%s', '%s', '%s')",
        $data['name'],
        $data['email'],
        $data['phone']
    );
    $conn->query($query);
    return $conn->insert_id;
}

// add order
function addOrder($data, $conn) {
    $query = sprintf(
        "insert into orders (`client_id`, `address`, `message`) values (%d, '%s', '%s')",
        $data['client_id'],
        $data['address'],
        $data['message']
    );
    $conn->query($query);
    return $conn->insert_id;
}

// add details of the order
function addDetails($data, $conn) {
    $cart = json_decode($data['cart'], true);
    $orderId = $data['order_id'];
    $values = array();
    foreach($cart as $cartItem) {
        $value = sprintf(
            "(%d, %d, '%s', %d, %d)",
            $orderId,
            $cartItem['id'],
            mysqli_real_escape_string($conn, $cartItem['name']),
            $cartItem['price'],
            $cartItem['count']
        );
        array_push($values, $value);
    }
    $query = sprintf(
        "insert into details (`order_id`, `good_id`, `good`, `price`, `count`) values %s",
        implode(',', $values)
    );
    $conn->query($query);
}

// send mail
function sendEmail($options) {
    $headers = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= 'From: =?utf-8?B?' . base64_encode($options['fromName']) . '?=<' . $options['fromEmail'] . '>';
    return mail($options['toEmail'], $options['subject'], $options['body'], $headers);
}


// sending
function sendEmailOrder($data) {
    $data['title'] = 'Your order from the  ' . SITE;
    $cart = json_decode($data['cart'], true);
    ob_start();
    include('tpl/email_order.php');
    $body = ob_get_contents();
    ob_end_clean();
    $sendClient = sendEmail(array(
        'subject' => 'Your order  ' . SITE,
        'fromName' => EMAIL_FROM_NAME,
        'fromEmail' => EMAIL_ADMIN,
        'toEmail' => $data['email'],
        'body' => $body
    ));
    if (!$sendClient) {
        throw new Exception('Error to write to client');
    }
    $sendAdmin = sendEmail(array(
        'subject' => 'New order from  ' . SITE,
        'fromName' => EMAIL_FROM_NAME,
        'fromEmail' => EMAIL_ADMIN,
        'toEmail' => EMAIL_ADMIN,
        'body' => $body
    ));
    if (!$sendAdmin) {
        throw new Exception('Error about email admin');
    }
}

try {
    $conn = connectDB();
    $data = getData($conn);

    $clientId = addClient($data, $conn);
    $data['client_id'] = $clientId;

    $orderId = addOrder($data, $conn);
    $data['order_id'] = $orderId;

    addDetails($data, $conn);

    sendEmailOrder($data);


    echo json_encode(array(
        'code' => 'success'
    ));
}
catch (Exception $e) {
    echo json_encode(array(
        'code' => 'error',
        'message' => $e->getMessage()
    ));
}

