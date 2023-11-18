<?php

include '../connection.php';

if (isset($_GET['missionId'])) {
    $missionId = $_GET['missionId'];
    
    $sql = "DELETE FROM aboutmission WHERE missionId = ?";
    
    $stmt = $con->prepare($sql);
    
 
    $stmt->bind_param("s", $missionId);
    
    if ($stmt->execute()) {
        echo "<script>alert('Mission deleted successfully!')</script>";
        echo '<script>window.location.href = "missionList.php";</script>'; 
        exit; 
    } else {
        echo "<script>alert('Error deleting mission!')</script>";
    }
    
    $stmt->close();
} else {
    echo "<script>alert('Invalid request!')</script>";
}

$con->close();
?>