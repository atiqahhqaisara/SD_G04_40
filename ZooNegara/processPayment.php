<?php
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$grandTotal = $_POST['grandTotal'];

$grandTotal = ($grandTotal * 100);

$apiUrl = 'https://dev.toyyibpay.com/index.php/api/createBill';
$secretKey = 'o7lyshad-atzp-t0y3-z3gy-fix1opoiy1vr';
$categoryCode = 'xacxkus6';
$billReturnUrl = 'http://localhost/ZooNegara/response.php';
$billpaymentStatus = 0;

$data = array(
    'userSecretKey' => $secretKey,
    'categoryCode' => $categoryCode,
    'billName' => 'Zoo Negara',
    'billDescription' => 'Ticket Checkout',
    'billPriceSetting' => 1,
    'billPayorInfo' => 1,
    'billAmount' => $grandTotal,
    'billReturnUrl' => $billReturnUrl,
    'billCallbackUrl' => '',
    'billExternalReferenceNo' => '',
    'billTo' => $fullName,
    'billEmail' => $email,
    'billPhone' => $phone,
    'billSplitPayment' => 0,
    'billSplitPaymentArgs' => '',
    'billPaymentChannel' => 0,
);

$options = array(
    'http' => array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data),
    ),
);

$context = stream_context_create($options);
$result = file_get_contents($apiUrl, false, $context);

if ($result === FALSE) {
    die('Error occurred while processing payment.');
}

// ...

// Decode the JSON response from ToyyibPay API
$obj = json_decode($result, true);

// Check if the BillCode is set in the response
if (isset($obj[0]['BillCode'])) {
    // Extract the BillCode from the response
    $billcode = $obj[0]['BillCode'];

    // Redirect to the ToyyibPay payment gateway
    header("Location: https://dev.toyyibpay.com/{$billcode}");
    exit;
} else {
    // Handle the case where BillCode is not present in the response
    die('Error: BillCode not present in ToyyibPay API response.');
}
?>
