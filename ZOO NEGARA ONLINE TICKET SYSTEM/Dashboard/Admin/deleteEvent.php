<?php
include '../connection.php';
if (isset($_GET['eventId'])) {
    $eventId = $_GET['eventId'];
    $sql = "DELETE FROM event WHERE eventId = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $eventId);
    if ($stmt->execute()) {
        echo "<script>alert('Event deleted successfully!')</script>";
        echo '<script>window.location.href = "eventList.php";</script>'; 
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
