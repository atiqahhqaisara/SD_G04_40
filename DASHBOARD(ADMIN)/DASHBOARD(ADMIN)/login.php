<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Admin Login</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.php">
					<img src="vendors/images/deskapp-logo.svg" alt="">
				</a>
			</div>
			<div class="login-menu">
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login To Dashboard</h2>
						</div>
<form method="POST" action="">
	<div class="select-role">
		<div class="btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn active">
				<input type="radio" name="role" value="admin" id="admin" checked>
				<div class="icon"><img src="vendors/images/briefcase.svg" class="svg" alt=""></div>
				<span>I'm</span>
				Admin
			</label>
			<label class="btn">
				<input type="radio" name="role" value="staff" id="staff">
				<div class="icon"><img src="vendors/images/person.svg" class="svg" alt=""></div>
				<span>I'm</span>
				Staff
			</label>
		</div>
	</div>
			<div class="input-group custom">
				<input type="text" name="email" id="email" class="form-control form-control-lg" placeholder="Username">
				<div class="input-group-append custom">
					<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
				</div>
			</div>
			<div class="input-group custom">
				<input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password">
				<div class="input-group-append custom">
					<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
				</div>
			</div>
			<div class="row pb-30">
				<div class="col-6">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="customCheck1">
						<label class="custom-control-label" for="customCheck1">Remember</label>
					</div>
				</div>
				<div class="col-6">
					<div class="forgot-password"><a href="forgot_pwd.php">Forgot Password?</a></div>
				</div>
			</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<!-- Submit button Sign In-->
										<input type="submit" class="btn btn-primary btn-lg btn-block" name="login" id="login" value="Sign In">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>

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


