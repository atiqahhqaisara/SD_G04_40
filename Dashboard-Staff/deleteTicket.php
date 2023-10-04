<?php

include 'connection.php';

if (isset($_GET['ticketId'])) {
    $ticketId = $_GET['ticketId'];
    
    $sql = "DELETE FROM ticket WHERE ticketId = ?";
    
    $stmt = $con->prepare($sql);
    
 
    $stmt->bind_param("s", $ticketId);
    
    if ($stmt->execute()) {
      
        echo "Ticket deleted successfully.";
        echo '<script>window.location.href = "/Dashboard/ticketList.php";</script>'; 
        exit; 
    } else {
        
        echo "Error deleting ticket: " . $stmt->error;
    }
    
    $stmt->close();
} else {
    echo "Invalid request.";
}

$con->close();
?>
