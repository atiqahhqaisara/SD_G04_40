<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the POST parameters
    $bookingDate = isset($_POST['bookingDate']) ? $_POST['bookingDate'] : '';
    $fullName = isset($_POST['fullName']) ? $_POST['fullName'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $MYadult = isset($_POST['MYadult']) ? $_POST['MYadult'] : '';
    $Iadult = isset($_POST['Iadult']) ? $_POST['Iadult'] : '';
    $MYchild = isset($_POST['MYchild']) ? $_POST['MYchild'] : '';
    $Ichild = isset($_POST['Ichild']) ? $_POST['Ichild'] : '';
    $MYsenior = isset($_POST['MYsenior']) ? $_POST['MYsenior'] : '';
    $Isenior = isset($_POST['Isenior']) ? $_POST['Isenior'] : '';
    $grandTotal = isset($_POST['grandTotal']) ? $_POST['grandTotal'] : '';

    // Check if date is not empty and in the expected format
    if (empty($bookingDate)) {
        die("Error: Empty date.");
    }

    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $bookingDate)) {
        die("Error: Invalid date format. Received date: $bookingDate");
    }

    // Insert data into your database table (replace 'your_table' with your actual table name)
    include 'connection.php'; // Assuming you have a connection.php file

    // Check if bookingDate is not empty before attempting to insert
    if (!empty($bookingDate)) {
        $sql = "INSERT INTO booking (bookingDate, fullName, email, phone, MYadult, Iadult, MYchild, Ichild, MYsenior, Isenior, grandTotal) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssssssi", $bookingDate, $fullName, $email, $phone, $MYadult, $Iadult, $MYchild, $Ichild, $MYsenior, $Isenior, $grandTotal);

        if ($stmt->execute()) {
            echo "Payment successful. Data inserted into the database.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: Empty date.";
    }

    $con->close();
}

?>
