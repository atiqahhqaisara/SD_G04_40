<?php

include '../connection.php';

if (isset($_GET['visionId'])) {
    $visionId = $_GET['visionId'];
    
    $sql = "DELETE FROM aboutvision WHERE visionId = ?";
    
    $stmt = $con->prepare($sql);
    
 
    $stmt->bind_param("s", $visionId);
    
    if ($stmt->execute()) {
        echo "<script>alert('Vision deleted successfully!')</script>";
        echo '<script>window.location.href = "visionList.php";</script>'; 
        exit; 
    } else {
        echo "<script>alert('Error deleting vision!')</script>";
    }
    
    $stmt->close();
} else {
    echo "<script>alert('Invalid request!')</script>";
}

$con->close();
?>
