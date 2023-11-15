<?php

$billcode = $_GET['billcode'];
$some_data = array(
  'billCode' => $billcode,
  'billpaymentStatus' => ''
);

$curl = curl_init();

curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/getBillTransactions');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);

$result = curl_exec($curl);
$info = curl_getinfo($curl);
curl_close($curl);

// Get value from array result
$result = json_decode($result, true);
$billpaymentStatus = $result[0]['billpaymentStatus'];
$billTo = $result[0]['billTo'];
$billEmail = $result[0]['billEmail'];
$billPhone = $result[0]['billPhone'];
$billpaymentAmount = $result[0]['billpaymentAmount'];
$billpaymentInvoiceNo = $result[0]['billpaymentInvoiceNo'];

if ($billpaymentStatus == 1) {
  // Connect database connection
  include "connection.php";

  // Update database table
  $sql = "INSERT INTO payment (transactionID,  name, email, phone, price, status) 
      VALUES ('$billpaymentInvoiceNo', '$billTo', '$billEmail', '$billPhone', '$billpaymentAmount', '$billpaymentStatus')";

  // Check if SQL success
  if ($con->query($sql) === TRUE) {
    header("Location:receipt.php");
  } else {
    echo "Error: " . $sql . "<br>" . $con->error;
  }
} else if ($billpaymentStatus == 3) {
  header("Location:unsuccessPayment.php");
} else {
  echo "pending";
}
