<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../connection.php';

$row = []; // Initialize $row as an empty array

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Handle the POST request to update administrator information
    $picId = $_POST['picId'];
    $picName = $_POST['picName'];
    $picNum = $_POST['picNum'];
    $picEmail = $_POST['picEmail'];

    $sql = "UPDATE contact SET  
    picName=?, 
    picNum=?, 
    picEmail=?
    WHERE picId=?";

    $stmt = $con->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssss", $picName, $picNum, $picEmail, $picId);

    if ($stmt->execute()) {
        // Update successful
        echo "<script>alert('Contact Record Updated!')</script>";
        echo '<script>window.location.href = "contactList.php";</script>'; // Redirect using JavaScript
        exit; // Terminate the script
    } else {
        // Error handling
        echo "Error updating person in charge information: " . $stmt->error;
    }

    $stmt->close();
} elseif (isset($_GET['picId'])) {
    // Handle the GET request to display administrator information
    $picId = $_GET['picId'];
    $sql = "SELECT * FROM contact WHERE picId = ?";
    $stmt = $con->prepare($sql);

    // Bind the email parameter
    $stmt->bind_param("s", $picId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Person in charge not found.";
        }
    } else {
        echo "Error retrieving person in charge information: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$con->close();
?>