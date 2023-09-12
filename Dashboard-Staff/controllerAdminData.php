<?php
session_start();
require "connection.php";

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Escape user inputs to prevent SQL injection (use prepared statements for better security)
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);

    // Query to check if the user with provided credentials exists
    $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password' LIMIT 1";

    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Database query failed: " . mysqli_error($con));
    }

    if (mysqli_num_rows($result) == 1) {
        $record = mysqli_fetch_array($result);
        $_SESSION['email'] = $record['email'];
        $_SESSION['password'] = $record['password'];
        
        // Determine the position based on the user's email
        $position = $record['position'];

        if ($position == 'admin') {
            header("Location: \Dashboard\dashboard_admin.php");
            exit; // Make sure to exit after redirection
        } else if ($position == 'staff') {
            header("Location:  \Dashboard-Staff\index.html");
            exit; // Make sure to exit after redirection
        } else {
            echo "<script>alert('Invalid position: $position');</script>";
            echo "<script>window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Login Unsuccessful');</script>";
        echo "<script>window.history.back();</script>";
    }
}
?>
