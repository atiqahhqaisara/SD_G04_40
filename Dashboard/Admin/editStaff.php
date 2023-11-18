<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../connection.php';

$row = []; // Initialize $row as an empty array

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Handle the POST request to update administrator information
    $fullName = $_POST['fullName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $address = $_POST['address'];
    $postal = $_POST['postal'];
    $district = $_POST['district'];
    $states = $_POST['states'];

    // Construct the SQL query to update the record
    $sql = "UPDATE admin SET 
        fullName=?, 
        phone=?, 
        position=?, 
        address=?, 
        postal=?, 
        district=?, 
        states=?
        WHERE email=?";

    $stmt = $con->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssssssss", $fullName, $phone, $position, $address, $postal, $district, $states, $email);

    if ($stmt->execute()) {
        echo "<script>alert('Staff Record Updated!')</script>";
        header("Location: staffList.php");
        exit; // Terminate the script
    } else {
        // Error handling
        echo "<script>alert('Error updating administrator information')</script>";

    }

    $stmt->close();
} elseif (isset($_GET['email'])) {
    // Handle the GET request to display administrator information
    $email = $_GET['email'];
    $sql = "SELECT * FROM admin WHERE email = ?";
    $stmt = $con->prepare($sql);

    // Bind the email parameter
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "<script>alert('Administrator Not Found!')</script>";
        }
    } else {
        echo "<script>alert('Error retrieving information!')</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Invalid Request!')</script>";
}

$con->close();
?>