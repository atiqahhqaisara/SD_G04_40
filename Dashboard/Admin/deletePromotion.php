<?php
include '../connection.php';
if (isset($_GET['promotionId'])) {
    $promotionId = $_GET['promotionId'];
 
    $sql = "DELETE FROM promotion WHERE promotionId = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $promotionId);
    
    if ($stmt->execute()) {
        echo "<script>alert('Promotion deleted successfully!')</script>";
        echo '<script>window.location.href = "promotionList.php";</script>'; 
        exit; 
    } else {
        echo "<script>alert('Error deleting promotion!')</script>";
    }
    $stmt->close();
} else {
    echo "<script>alert('Invalid request!')</script>";
}
$con->close();
?>
