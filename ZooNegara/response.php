<?php
// Check if billcode is present in $_GET or $_POST
$billcode = isset($_GET['billcode']) ? $_GET['billcode'] : (isset($_POST['billcode']) ? $_POST['billcode'] : '');

// Check if billcode is not empty
if (!empty($billcode)) {
    $some_data = array(
        'billCode' => $billcode,
        'billpaymentStatus' => '1'
    );

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_URL, 'https://dev.toyyibpay.com/index.php/api/getBillTransactions');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $some_data);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL certificate verification for testing

    echo "Before cURL request<br>";

    $result = curl_exec($curl);

    if ($result === FALSE) {
        die('cURL Error: ' . curl_error($curl));
    }

    echo "After cURL request<br>";

    $info = curl_getinfo($curl);
    curl_close($curl);

    // Get value from array result
    $result = json_decode($result, true);

    if (isset($result[0])) {
        $billpaymentStatus = $result[0]['billpaymentStatus'];
        $billTo = $result[0]['billTo'];
        $billEmail = $result[0]['billEmail'];
        $billPhone = $result[0]['billPhone'];
        $billpaymentAmount = $result[0]['billpaymentAmount'];
        $billpaymentInvoiceNo = $result[0]['billpaymentInvoiceNo'];

        // Connect database connection
        include "connection.php";
        $query = mysqli_query($con, "SELECT * FROM booking WHERE email='$billEmail' ");
        $row = mysqli_fetch_array($query);
        $bookingId = $row['bookingId'];
        $dateToday = date("Y-m-d");
        if ($billpaymentStatus == 1) {
            // Update the payment table
            $sql = "INSERT INTO payment (transactionID, name, email, phone, price, status) 
                    VALUES ('$billpaymentInvoiceNo', '$billTo', '$billEmail', '$billPhone', '$billpaymentAmount', '$billpaymentStatus')";

            // Check if SQL success
            if ($con->query($sql) === TRUE) {
                // Update the booking table
                $sql2 = "UPDATE booking SET status='$billpaymentStatus'
                WHERE bookingId='$bookingId' AND status='0'";
                if ($con->query($sql2) === TRUE) {
                    header("Location: http://localhost/ZooNegara/successPayment.php");
                    exit;
                } else {
                    echo "Error updating booking status: " . $con->error;
                }
            } else {
                echo "Error inserting into payment table: " . $con->error;
            }
        } elseif ($billpaymentStatus == 3) {
            header("Location: http://localhost/ZooNegara/unsuccessPayment.php");
            exit;
        } else {
            echo "Payment is pending";
        }
    } else {
        header("Location: http://localhost/ZooNegara/unsuccessPayment.php");
    }
} else {
    echo "Error: Missing or empty billcode parameter";
}
?>
