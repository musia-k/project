<?php

include_once './common.php';

define('EMAIL_ADMIN', 'krasmed17@gmail.com');
define('EMAIL_FROM_NAME', 'Kyselova Maryna');
define('SITE', ' ');

//getting from POST
function getParam($param, $conn, $default = '') {
    return (isset($_POST[$param])) ? mysqli_real_escape_string($conn, $_POST[$param]) : $default;
}

// prepare info
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

// add additional info
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

// send email
function sendEmail($options) {
    $headers = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= 'From: =?utf-8?B?' . base64_encode($options['fromName']) . '?=<' . $options['fromEmail'] . '>';
    return mail($options['toEmail'], $options['subject'], $options['body'], $headers);
}

// send email with order
function sendEmailOrder($data) {
    $data['title'] = 'Order from site ' . SITE;
    $cart = json_decode($data['cart'], true);
    ob_start();
    include('tpl/email_order.php');
    $body = ob_get_contents();
    ob_end_clean();
    $sendClient = sendEmail(array(
        'subject' => 'Your order' . SITE,
        'fromName' => EMAIL_FROM_NAME,
        'fromEmail' => EMAIL_ADMIN,
        'toEmail' => $data['email'],
        'body' => $body
    ));
    if (!$sendClient) {
        throw new Exception('Error occurs while sending to the customer`s email');
    }
    $sendAdmin = sendEmail(array(
        'subject' => 'New order from the site: ' . SITE,
        'fromName' => EMAIL_FROM_NAME,
        'fromEmail' => EMAIL_ADMIN,
        'toEmail' => EMAIL_ADMIN,
        'body' => $body
    ));
    if (!$sendAdmin) {
        throw new Exception('Error occurs while sending to admin email');
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

    /* sendEmailOrder($data); */
    echo json_encode(array(
        'code' => 'success'
    ));
}
catch (Exception $e) {
    // error
    echo json_encode(array(
        'code' => 'error',
        'message' => $e->getMessage()
    ));
}
