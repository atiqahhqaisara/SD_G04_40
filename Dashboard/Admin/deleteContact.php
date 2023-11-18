<?php

include '../connection.php';

if (isset($_GET['picId'])) {
    $picId = $_GET['picId'];
    
    $sql = "DELETE FROM contact WHERE picId = ?";
    
    $stmt = $con->prepare($sql);
    
 
    $stmt->bind_param("s", $picId);
    
    if ($stmt->execute()) {
        echo "<script>alert('PIC deleted successfully!')</script>";
        echo '<script>window.location.href = "contactList.php";</script>'; 
        exit; 
    } else {
        echo "<script>alert('Error deleting PIC!')</script>";
    }
    
    $stmt->close();
} else {
    echo "<script>alert('Invalid request!')</script>";
}

$con->close();
?>
