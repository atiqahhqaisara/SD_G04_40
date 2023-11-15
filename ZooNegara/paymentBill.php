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

if ($result === false) {
  // Handle cURL error
  echo "cURL Error: " . curl_error($curl);
  exit;
}

$info = curl_getinfo($curl);
curl_close($curl);

// Get values from the JSON response
$result = json_decode($result, true);
$billpaymentStatus = $result[0]['billpaymentStatus'];
$billTo = $result[0]['billTo'];
$billEmail = $result[0]['billEmail'];
$billPhone = $result[0]['billPhone'];
$billpaymentAmount = $result[0]['billpaymentAmount'];
$billpaymentInvoiceNo = $result[0]['billpaymentInvoiceNo'];

if ($billpaymentStatus == 1) {
  // Connect to the database
  include "../../db_conn.php";

  // Validate and sanitize user inputs
  $billTo = mysqli_real_escape_string($con, $billTo);
  $billEmail = mysqli_real_escape_string($con, $billEmail);
  $billPhone = mysqli_real_escape_string($con, $billPhone);
  $billpaymentInvoiceNo = mysqli_real_escape_string($con, $billpaymentInvoiceNo);

  // Fetch user ID from the database
  $query = mysqli_query($con, "SELECT * FROM customer WHERE email='$billEmail' ");
  $row = mysqli_fetch_array($query);
  $userID = $row['userID'];
  $dateToday = date("Y-m-d");

  // Use prepared statements to prevent SQL injection
  $stmt = $con->prepare("INSERT INTO userpayment (transactionID, userID, name, email, phoneNumber, price, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssss", $billpaymentInvoiceNo, $userID, $billTo, $billEmail, $billPhone, $billpaymentAmount, $billpaymentStatus);

  if ($stmt->execute()) {
    // Update status from the database table to 0
    $stmt2 = $con->prepare("UPDATE usercart SET status='0', date=? WHERE userID=? AND status='1'");
    $stmt2->bind_param("ss", $dateToday, $userID);

    if ($stmt2->execute()) {
      header("Location:../../../Alerts/successPayment.php");
    } else {
      echo "Error updating usercart: " . $stmt2->error;
    }

    $stmt2->close();
  } else {
    echo "Error inserting into userpayment: " . $stmt->error;
  }

  $stmt->close();
} elseif ($billpaymentStatus == 3) {
  header("Location:../../../Alerts/unsuccessPayment.php");
} else {
  echo "Pending";
}
?>
