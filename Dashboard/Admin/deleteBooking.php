<?php

include '../connection.php';

if (isset($_GET['bookingId'])) {
    $bookingId = $_GET['bookingId'];
    
    $sql = "DELETE FROM booking WHERE bookingId = ?";
    
    $stmt = $con->prepare($sql);
    
 
    $stmt->bind_param("s", $bookingId);
    
    if ($stmt->execute()) {
        echo "<script>alert('Booking deleted successfully!')</script>";
        echo '<script>window.location.href = "bookingList.php";</script>'; 
        exit; 
    } else {
        echo "<script>alert('Error deleting booking!')</script>";
    }
    
    $stmt->close();
} else {
    echo "<script>alert('Invalid request!')</script>";
}

$con->close();
?>
