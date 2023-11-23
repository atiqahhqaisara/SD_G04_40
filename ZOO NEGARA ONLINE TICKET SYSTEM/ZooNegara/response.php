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

    $result = curl_exec($curl);

    if ($result === FALSE) {
        die('cURL Error: ' . curl_error($curl));
    }

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

        // Connect database connection
        include "connection.php";

        // Check if a booking already exists for this email
        $query = mysqli_query($con, "SELECT * FROM booking WHERE email='$billEmail' AND status='0'");
        $row = mysqli_fetch_array($query);

        if ($row) {
            // Booking with status '0' already exists
            // Retrieve the bookingId and update the booking status
            $bookingId = $row['bookingId'];
            $sql = "UPDATE booking SET status='1' WHERE bookingId='$bookingId' AND status='0'";
            
            if ($con->query($sql) === TRUE) {
                // Insert a new record in the payment table
                $sql2 = "INSERT INTO payment (transactionID, name, email, phone, price, status) 
                         VALUES ('$billcode', '$billTo', '$billEmail', '$billPhone', '$billpaymentAmount', '$billpaymentStatus')";

                if ($con->query($sql2) === TRUE) {
                    header("Location: successPayment.php");
                    exit;
                } else {
                    echo "Error inserting into payment table: " . $con->error;
                }
            } else {
                echo "Error updating booking status: " . $con->error;
            }
        } else {
           header("Location: successPayment.php");
                    exit;
        }
    } else {
        header("Location: unsuccessPayment.php");
    }
} else {
    echo "Error: Missing or empty billcode parameter";
}
?>
