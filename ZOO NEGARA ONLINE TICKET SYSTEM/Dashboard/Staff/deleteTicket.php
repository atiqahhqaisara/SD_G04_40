<?php

include '../connection.php';

if (isset($_GET['ticketId'])) {
    $ticketId = $_GET['ticketId'];
    
    $sql = "DELETE FROM ticket WHERE ticketId = ?";
    
    $stmt = $con->prepare($sql);
    
 
    $stmt->bind_param("s", $ticketId);
    
    if ($stmt->execute()) {
        echo "<script>alert('Ticket deleted successfully!')</script>";
        echo '<script>window.location.href = "ticketList.php";</script>'; 
        exit; 
    } else {
        echo "<script>alert('Error deleting ticket!')</script>";
    }
    
    $stmt->close();
} else {
    echo "<script>alert('Invalid request!')</script>";
}

$con->close();
?>
