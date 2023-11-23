<?php
include 'connection.php';

if (isset($_GET['eventId'])) {
    $eventId = mysqli_real_escape_string($con, $_GET['eventId']);
    $query = "SELECT * FROM event WHERE eventId='$eventId' ";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $event = mysqli_fetch_array($query_run);

    } else {
        echo "<h4>No Such Event Id Found</h4>";
    }
} else {
    echo "Invalid request.";
}

$con->close();
?>