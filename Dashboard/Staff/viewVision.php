<?php
include '../connection.php';

if (isset($_GET['visionId'])) {
    $visionId = mysqli_real_escape_string($con, $_GET['visionId']);
    $query = "SELECT * FROM aboutvision WHERE visionId='$visionId' ";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $vision = mysqli_fetch_array($query_run);

    } else {
        echo "<h4>No Such Vision Id Found</h4>";
    }
} else {
    echo "Invalid request. GET parameters: ";
    var_dump($_GET);
}

$con->close();
?>