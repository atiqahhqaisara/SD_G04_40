<?php
include '../connection.php';

if (isset($_GET['email'])) {
    $email = mysqli_real_escape_string($con, $_GET['email']);
    $query = "SELECT * FROM admin WHERE email='$email' ";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $admin = mysqli_fetch_array($query_run);
    } else {
        echo "<h4>No Such Staff Found</h4>";
    }
} else {
    echo "Invalid request.";
}

$con->close();
?>
