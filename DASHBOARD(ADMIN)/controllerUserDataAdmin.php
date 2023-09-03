<?php 
session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();

//admin click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM admin WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if($email == $_SESSION['email' && $password == $_SESSION['password']] ){
            header('location: index.html')              
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
    }
?>