<?php

include '../connection.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    
    // Construct the SQL query to delete the administrator record
    $sql = "DELETE FROM admin WHERE email = ?";
    
    $stmt = $con->prepare($sql);
    
    // Bind the email parameter
    $stmt->bind_param("s", $email);
    
    if ($stmt->execute()) {
        // Deletion successful
        echo "<script>alert('Staff deleted successfully!')</script>";
        echo '<script>window.location.href = "staffList.php";</script>'; // Redirect using JavaScript
        exit; // Terminate the script
    } else {
        // Error handling
        echo "<script>alert('Error deleting staff!')</script>";
    }
    
    $stmt->close();
} else {
    echo "<script>alert('Invalid request!')</script>";
}

$con->close();
?>
