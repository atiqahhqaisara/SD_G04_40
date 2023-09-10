<?php
session_start(); // Add this line to start the session
require "connection.php";
$email = "";
$password = "";
$role = "";
$errors = array();

if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $role = mysqli_real_escape_string($con, $_POST['role']);

    $check_email = "SELECT * FROM admin WHERE email = '$email'";
    $res = mysqli_query($con, $check_email);

    if ($res) {
        if (mysqli_num_rows($res) > 0) {
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];

            // Verify the password
            if (password_verify($password, $fetch_pass)) {
                $db_role = $fetch['role']; // Get the role from the database

                // Check if the selected role matches the database role
                if ($role === $db_role) {
                    // Role matches, proceed with login
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['role'] = $role;

                    // Redirect to the appropriate dashboard based on the role
                    if ($role === "admin") {
                        echo "Redirecting to admin dashboard"; 
                        header('Location: index.html');
                        exit();
                    } elseif ($role === "staff") {
                        header('Location: index2.html');
                        exit();
                    }
                } else {
                    // Role doesn't match
                    $errors['email'] = "Incorrect role selected.";
                }
            } else {
                // Incorrect email or password
                $errors['email'] = "Incorrect email or password!";
            }
        } else {
            // Admin with this email does not exist
            $errors['email'] = "Admin with this email does not exist!";
        }
    } else {
        // Handle database query error
        $errors['email'] = "Database error: " . mysqli_error($con);
    }
}
?>
