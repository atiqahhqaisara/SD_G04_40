<?php 
session_start();
require "connection.php";
$errors = []; // Initialize an array to store errors

if (isset($_POST['login'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $check_email = "SELECT * FROM admin WHERE email = '$email'";
    $res = mysqli_query($con, $check_email);
    if(mysqli_num_rows($res) > 0){
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if(password_verify($password, $fetch_pass)){
            $_SESSION['email'] = $email;
            $role = $fetch['role'];
            if($role == 'admin'){
                header('location: index.html');
                exit(); // Add exit to prevent further execution
            }else{
                $info = "It's look like you haven't still verified your email - $email";
                $_SESSION['info'] = $info;
                header('location: profile.html');
                exit(); // Add exit to prevent further execution
            }
        }else{
            $errors['email'] = "Incorrect email or password!";
        }
    }else{
        $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to sign up.";
    }
}

// Handle errors
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo '<p style="color:red;">' . $error . '</p>';
    }
}
?>
