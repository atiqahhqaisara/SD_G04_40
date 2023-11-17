<?php
include 'connection.php';

echo "Debug Info: ";
foreach ($_POST as $key => $value) {
    echo htmlspecialchars("$key: $value") . "<br>";
}

// Retrieve values from the POST parameters
$bookingDate = isset($_POST['bookingDate']) ? $_POST['bookingDate'] : '';
$MYadult = isset($_POST['MYadult']) ? $_POST['MYadult'] : 0;
$Iadult = isset($_POST['Iadult']) ? (int)$_POST['Iadult'] : 0;
$MYchild = isset($_POST['MYchild']) ? (int)$_POST['MYchild'] : 0;
$Ichild = isset($_POST['Ichild']) ? (int)$_POST['Ichild'] : 0;
$MYsenior = isset($_POST['MYsenior']) ? (int)$_POST['MYsenior'] : 0;
$Isenior = isset($_POST['Isenior']) ? (int)$_POST['Isenior'] : 0;
$fullName = isset($_POST['fullName']) ? $_POST['fullName'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';

// Check if date is not empty and in the expected format
if (empty($bookingDate) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $bookingDate)) {
    die("Error: Invalid date format or empty date.");
}

// Validate email
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Error: Invalid email format or empty email.");
}

// Validate and set to zero if empty or non-numeric
$MYadult = (!empty($MYadult) && is_numeric($MYadult)) ? $MYadult : 0;
$Iadult = (!empty($Iadult) && is_numeric($Iadult)) ? $Iadult : 0;
$MYchild = (!empty($MYchild) && is_numeric($MYchild)) ? $MYchild : 0;
$Ichild = (!empty($Ichild) && is_numeric($Ichild)) ? $Ichild : 0;
$MYsenior = (!empty($MYsenior) && is_numeric($MYsenior)) ? $MYsenior : 0;
$Isenior = (!empty($Isenior) && is_numeric($Isenior)) ? $Isenior : 0;

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "INSERT INTO booking (bookingDate, MYadult, Iadult, MYchild, Ichild, MYsenior, Isenior, fullName, email, phone, orderDate) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

$stmt = $con->prepare($sql);
$stmt->bind_param("ssssssssss", $bookingDate, $MYadult, $Iadult, $MYchild, $Ichild, $MYsenior, $Isenior, $fullName, $email, $phone);

if ($stmt->execute()) {
    $lastInsertId = $stmt->insert_id; // Retrieve the auto-generated bookingId
    echo "Booking information inserted successfully. Booking ID: " . $lastInsertId;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$con->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Processed</title>
</head>

<body>

    <h2>Booking Processed Successfully</h2>
    <p>Your booking information has been recorded.</p>
    <p>Thank you for choosing our service!</p>

    <form action="summaryOrder.php" method="post">
        <input type="hidden" name="bookingDate" value="<?= htmlspecialchars($bookingDate) ?>">
        <input type="hidden" name="fullName" value="<?= htmlspecialchars($fullName) ?>">
        <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
        <input type="hidden" name="phone" value="<?= htmlspecialchars($phone) ?>">
        <input type="hidden" name="MYadult" value="<?= htmlspecialchars($MYadult) ?>">
        <input type="hidden" name="Iadult" value="<?= htmlspecialchars($Iadult) ?>">
        <input type="hidden" name="MYchild" value="<?= htmlspecialchars($MYchild) ?>">
        <input type="hidden" name="Ichild" value="<?= htmlspecialchars($Ichild) ?>">
        <input type="hidden" name="MYsenior" value="<?= htmlspecialchars($MYsenior) ?>">
        <input type="hidden" name="Isenior" value="<?= htmlspecialchars($Isenior) ?>">

        <input type="submit" value="Proceed to Summary">
    </form>

</body>

</html>
