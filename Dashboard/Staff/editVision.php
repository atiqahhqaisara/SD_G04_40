<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../connection.php';

$row = []; // Initialize $row as an empty array

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Handle the POST request to update vision information
    $visionId = $_POST['visionId']; // Retrieve visionId
    $vision = $_POST['vision'];

    // File uploaded successfully, update vision information
    $sql = "UPDATE aboutvision SET  
vision=? 
WHERE visionId=?";

    $stmt = $con->prepare($sql);

    // Bind parameters
    $stmt->bind_param("si", $vision, $visionId);

    if ($stmt->execute()) {
        // Update successful
        echo "<script>alert('Vision Information Updated!')</script>";
        echo '<script>window.location.href = "visionList.php";</script>'; // Redirect using JavaScript
        exit; // Terminate the script
    } else {
        // Error handling
        echo "<script>alert('Error updating vision information: ' . $stmt->error . '')</script>";
    }

    $stmt->close();
} elseif (isset($_GET['visionId'])) {
    // Handle the GET request to display vision information
    $visionId = $_GET['visionId'];
    $sql = "SELECT * FROM aboutvision WHERE visionId = ?";
    $stmt = $con->prepare($sql);

    // Bind the visionId parameter
    $stmt->bind_param("i", $visionId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Vision not found.";
        }
    } else {
        echo "Error retrieving vision information: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$con->close();
?>