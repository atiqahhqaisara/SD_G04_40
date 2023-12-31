<?php
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
require "connection.php"; // Include your database connection file
require "vendor/autoload.php"; // Include the autoload.php file

$email = "";
$name = "";
$errors = array();

// if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $dob = mysqli_real_escape_string($con, $_POST['dob']);
    $contactNumber = mysqli_real_escape_string($con, $_POST['contactNumber']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    // Password validation
    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    } elseif (strlen($password) < 8) {
        $errors['password'] = "Password must be at least 8 characters long!";
    } elseif (!preg_match("/[A-Z]/", $password)) {
        $errors['password'] = "Password must contain at least one uppercase letter!";
    } elseif (!preg_match("/[a-z]/", $password)) {
        $errors['password'] = "Password must contain at least one lowercase letter!";
    } elseif (!preg_match("/\d/", $password)) {
        $errors['password'] = "Password must contain at least one numeric digit!";
    } elseif (!preg_match("/[!@#\$%\^&\*\(\)_\+\-=\[\]\{\};:'\",.<>\/?\\|]/", $password)) {
        $errors['password'] = "Password must contain at least one special character!";
    }
    
    $email_check = "SELECT * FROM customer WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    
    if (count($errors) === 0) {
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO customer (name, dob, contactNumber, email, password, code, status)
                        values('$name', '$dob', '$contactNumber', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);
        
        if ($data_check) {
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            
            // Configure PHPMailer
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->Host = "smtp.gmail.com"; // Enter your SMTP host
            $mail->SMTPAuth = true;
            $mail->Username = "zoonegara4004@gmail.com"; // Enter your email address
            $mail->Password = "wjhbxlblwmmrgesc"; // Enter your email password
            $mail->Port = 587;
            $mail->IsHTML(true);
            $mail->From = "zoonegara4004@gmail.com";
            $mail->FromName = "Admin Zoo Negara";
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->addAddress($email);
            
            if ($mail->send()) {
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: cust_otp.php');
                exit();
            } else {
                $errors['otp-error'] = "Failed while sending code!";
            }
        } else {
            $errors['db-error'] = "Failed while inserting data into the database!";
        }
    }
}

// if user click verification code submit button
if(isset($_POST['check'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM customer WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE customer SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($con, $update_otp);
        if($update_res){
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            header('location: homepage.php');
            exit();
        } else {
            $errors['otp-error'] = "Failed while updating code!";
        }
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}

// if user click login button
if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $check_email = "SELECT * FROM customer WHERE email = '$email'";
    $res = mysqli_query($con, $check_email);
    if(mysqli_num_rows($res) > 0){
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if(password_verify($password, $fetch_pass)){
            $_SESSION['email'] = $email;
            $status = $fetch['status'];
            if($status == 'verified'){
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: homepage.php');
            } else {
                $info = "It's look like you haven't still verify your email - $email";
                $_SESSION['info'] = $info;
                header('location: cust_otp.php');
            }
        } else {
            $errors['email'] = "<span style='color: red;'>Incorrect email or password!</span>";
        }
    } else {
        $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
    }
}
    
    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM customer WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new_password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE customer SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password_changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }

    if (isset($_POST['check-email'])) {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM customer WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
    
        if (mysqli_num_rows($run_sql) > 0) {
            $code = rand(999999, 111111);
            $insert_code = "UPDATE customer SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
    
            if ($run_query) {
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
    
                $mail = new PHPMailer(true);
                try {
                    $mail->IsSMTP();
                    $mail->Host = "smtp.gmail.com"; // Enter your host here
                    $mail->SMTPAuth = true;
                    $mail->Username = "zoonegara4004@gmail.com"; // Enter your email here
                    $mail->Password = "wjhbxlblwmmrgesc"; // Enter your password here
                    $mail->Port = 587;
                    $mail->IsHTML(true);
                    $mail->From = "zoonegara4004@gmail.com";
                    $mail->FromName = "Admin Zoo Negara";
    
                    // Set the recipient's email address
                    $mail->addAddress($email);
    
                    // Set email subject and body
                    $mail->Subject = $subject;
                    $mail->Body = $message;
    
                    // Enable debugging for PHPMailer
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    
                    // Send the email
                    $mail->send();
    
                    $info = "We've sent a password reset OTP to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset_code.php');
                    exit();
                } catch (Exception $e) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                }
            } else {
                echo "Database Error: Something went wrong!";
            }
        } else {
            echo "Email Error: This email address does not exist!";
        }
    }


   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: registerSignIn.php');
    }
?>