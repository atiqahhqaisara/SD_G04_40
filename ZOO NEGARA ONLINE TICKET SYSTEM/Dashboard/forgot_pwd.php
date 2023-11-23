<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$error = "";
?>
<html>
<!DOCTYPE html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8" />
	<title>Forgot Password</title>
	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png" />
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png" />
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
		rel="stylesheet" />
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css" />
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
		crossorigin="anonymous"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() {
			dataLayer.push(arguments);
		}
		gtag("js", new Date());
		gtag("config", "G-GBZ3SGGX85");
	</script>
	<!-- Google Tag Manager -->
	<script>
		(function (w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != "dataLayer" ? "&l=" + l : "";
			j.async = true;
			j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, "script", "dataLayer", "GTM-NXZMQSS");
	</script>
	<!-- End Google Tag Manager -->
</head>
<body>
	<?php
	include('connection.php');
	if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
		$email = $_POST["email"];
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		$email = filter_var($email, FILTER_VALIDATE_EMAIL);
		if (!$email) {
			$error .= "Invalid email address";
		} else {
			$sel_query = "SELECT * FROM `admin` WHERE email='" . $email . "'";
			$results = mysqli_query($con, $sel_query);
			$row = mysqli_num_rows($results);
			if ($row === 0) {
				$error .= "<script>alert('No record found!');</script>";
			}
		}
		if ($error != "") {
			echo $error;
		} else {
			$output = '';
			$expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
			$expDate = date("Y-m-d H:i:s", $expFormat);
			$key = md5(time());
			$addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
			$key = $key . $addKey;
			// Insert Temp Table
			mysqli_query($con, "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');");
			$output .= '<p>Please click on the following link to reset your password.</p>';
			//replace the site url
			$output .= '<p><a href="http://localhost/Dashboard/reset-password.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">Reset Password</a></p>';
			$body = $output;
			$subject = "Password Recovery";
			$email_to = $email;
			//autoload the PHPMailer
			require("vendor/autoload.php");
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = "smtp.gmail.com"; // Enter your host here
			$mail->SMTPAuth = true;
			$mail->Username = "zoonegara4004@gmail.com"; // Enter your email here
			$mail->Password = "wjhbxlblwmmrgesc"; //Enter your password here
			$mail->Port = 587;
			$mail->IsHTML(true);
			$mail->From = "zoonegara4004@gmail.com";
			$mail->FromName = "Admin Zoo Negara";
			$mail->Subject = $subject;
			$mail->Body = $body;
			$mail->AddAddress($email_to);
			if (!$mail->Send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
				echo "<script>alert('An email has been sent. Please check your email');</script>";
			}
		}
	}
	?>
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<img src="vendors/images/deskapp-logo.svg" alt="" />
				</a>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<img src="vendors/images/forgot-password.png" alt="" />
				</div>
				<div class="col-md-6">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Forgot Password</h2>
						</div>
						<h6 class="mb-20">
							Enter your email address to reset your password
						</h6>
						<form method="post" action="" name="reset">
							<div class="input-group custom">
								<input type="email" name="email" class="form-control form-control-lg"
									placeholder="Email" />
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="fa fa-envelope-o"
											aria-hidden="true"></i></span>
								</div>
							</div>
							<div class="row align-items-center">
								<div class="col-5">
									<div class="input-group mb-0">
										<input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
									</div>
								</div>
								<div class="col-2">
									<div class="font-16 weight-600 text-center" data-color="#707373">
										OR
									</div>
								</div>
								<div class="col-5">
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="index.php">Login</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
