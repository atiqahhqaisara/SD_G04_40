<?php

include 'connection.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    
    // Construct the SQL query to delete the administrator record
    $sql = "DELETE FROM admin WHERE email = ?";
    
    $stmt = $con->prepare($sql);
    
    // Bind the email parameter
    $stmt->bind_param("s", $email);
    
    if ($stmt->execute()) {
        // Deletion successful
        echo "Administrator deleted successfully.";
        echo '<script>window.location.href = "/Dashboard/staffList.php";</script>'; // Redirect using JavaScript
        exit; // Terminate the script
    } else {
        // Error handling
        echo "Error deleting administrator: " . $stmt->error;
    }
    
    $stmt->close();
} else {
    echo "Invalid request.";
}

$con->close();
?>
