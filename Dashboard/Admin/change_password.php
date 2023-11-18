<?php
require '../controllerAdminData.php'
	?>
<!DOCTYPE html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Change Password</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
		rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>

<body>

	<div class="header">
		<div class="header-left">

		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<?php
						$currentAdmin = $_SESSION['email'];
						$sql = "SELECT * FROM admin WHERE email='$currentAdmin'";
						$result = $con->query($sql);

						if ($result && mysqli_num_rows($result) > 0) {
							$row = mysqli_fetch_assoc($result);
							$profileImage = $row['profilePicture']; // Assuming the column name is 'profilePicture'
							$fullName = $row['fullName']; // Assuming the column name is 'fullName'
							if (!empty($profileImage)) {
								echo '<img src="../profile/' . $profileImage . '" alt="Profile Image" class="user-icon">';
							} else {
								echo '<img src="vendors/images/default-avatar.jpg" alt="Default Avatar" class="user-icon">';
							}
							echo '<span class="user-name">' . $fullName . '</span>';
						} else {
							echo '<img src="vendors/images/default-avatar.jpg" alt="Default Avatar" class="user-icon">';
						}
						?>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="profile.php"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="change_password.php"><i class="dw dw-password"></i> Change
							Password</a>
						<a class="dropdown-item" href="../index.php"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Layout Settings
				<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Header Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input"
							value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input"
							value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input"
							value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i
								class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input"
							value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i
								class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input"
							value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
								aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input"
							value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input"
							value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i
								class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input"
							value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i
								class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input"
							value="icon-list-style-6">
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-danger" id="reset-settings">Reset Settings</button>
				</div>
			</div>
		</div>
	</div>

	<!-- sidebar menu - left -->
	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php" >
				<img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li>
						<a href="index.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
						</a>
					</li>
					
					<li>
						<a href="staffList.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-id-card"></span><span class="mtext">Staff</span>
						</a>
					</li>
					
					<li>
						<div class="sidebar-small-cap">Zoo Negara Website</div>
					</li>
					<li>
						<a href="http://localhost/ZooNegara/index.php" class="dropdown-toggle no-arrow">
							<span class="micon ti-home"></span><span class="mtext">Homepage</span>
						</a>
					</li>

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon ti-info"></span><span class="mtext">About</span>
						</a>
						<ul class="submenu">
							<li><a href="visionList.php">Vision List</a></li>
							<li><a href="missionList.php">Mission List</a></li>
						</ul>
					</li>

					<li>
						<a href="bookingList.php" class="dropdown-toggle no-arrow">
							<span class="micon ti-shopping-cart"></span><span class="mtext">Booking</span>
						</a>
					</li>

					<li>
						<a href="contactList.php" class="dropdown-toggle no-arrow">
							<span class="micon  fa fa-user-o"></span><span class="mtext">Contact</span>
						</a>
					</li>

					<li>
						<a href="enquiryList.php" class="dropdown-toggle no-arrow">
							<span class="micon ti-help-alt"></span><span class="mtext">Enquiry</span>
						</a>
					</li>

					<li>
						<a href="eventList.php" class="dropdown-toggle no-arrow">
							<span class="micon ti-map"></span><span class="mtext">Event</span>
						</a>
					</li>

					<li>
						<a href="ticketList.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-ticket"></span><span class="mtext">Ticket</span>
						</a>
					</li>

					<li>
						<a href="promotionList.php" class="dropdown-toggle no-arrow">
							<span class="micon ti-announcement"></span><span class="mtext">Promotion</span>
						</a>
					</li>
					<li>
						<a href="salesReport.php" class="dropdown-toggle no-arrow">
							<span class="micon ti-files"></span><span class="mtext">Report</span>
						</a>
					</li>
		
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>


	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Change Paasword</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Change Password</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p">
							<div class="card-body">
								<div class="profile-photo">
									<!-- Remove the pencil icon link -->
									<!-- Display the user's profile image -->
									<?php
									$currentAdmin = $_SESSION['email'];
									$sql = "SELECT * FROM admin WHERE email='$currentAdmin'";
									$result = $con->query($sql);

									if ($result && mysqli_num_rows($result) > 0) {
										$row = mysqli_fetch_assoc($result);
										$profileImage = $row['profilePicture']; // Assuming the column name is 'profilePicture'
										if (!empty($profileImage)) {
											echo '<img src="./profile/' . $profileImage . '" alt="Profile Image" class="profile-photo">';
										} else {
											echo '<img src="vendors/images/default-avatar.jpg" alt="Default Avatar" class="profile-photo">';
										}
									} else {
										echo '<img src="vendors/images/default-avatar.jpg" alt="Default Avatar" class="profile-photo">';
									}
									?>
								</div>
								<!-- Fetch and display user profile information -->
								<?php
								$currentAdmin = $_SESSION['email'];
								$sql = "SELECT * FROM admin WHERE email='$currentAdmin'";
								$result = $con->query($sql);

								if ($result) {
									if (mysqli_num_rows($result) > 0) {
										$row = mysqli_fetch_assoc($result);
										?>
										<h5 class="text-center h5 mt-3">
											<?php echo $row['fullName']; ?>
										</h5>
										<p class="text-center text-muted font-14">
											<?php echo $row['position']; ?>
										</p>
										<div class="profile-info">
											<h5 class="mt-3 text-blue">Contact Information</h5>
											<ul class="list-unstyled">
												<li>
													<span>Email Address:</span>
													<?php echo $row['email']; ?>
												</li>
												<li>
													<span>Phone Number:</span>
													<?php echo $row['phone']; ?>
												</li>
												<li>
													<span>Address:</span>
													<?php echo $row['address']; ?><br>
													<?php echo $row['postal']; ?><br>
													<?php echo $row['district']; ?><br>
													<?php echo $row['states']; ?>
												</li>
											</ul>
										</div>
										<?php
									}
								}
								?>
							</div>
						</div>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="card-box height-100-p overflow-hidden">
							<div class="change_password-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#" role="tab">Change
												Password</a>
										</li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane fade show active" id="setting" role="tabpanel">
											<div class="change_password-setting">
												<div class="container">
													<br>
													<?php
													if (isset($_SESSION['email'])) {
														$currentAdmin = $_SESSION['email'];

														if (isset($_POST['updatePassword'])) {
															// Include your database connection file
															include('connection.php');

															$old_pass = $_POST['oldPass'];
															$new_pass = $_POST['newPass'];
															$re_pass = $_POST['rePass'];

															// Check the connection
															if ($con->connect_error) {
																die("Connection failed: " . $con->connect_error);
															}

															// Use prepared statements to prevent SQL injection
															$stmt = $con->prepare("SELECT * FROM admin WHERE email = ?");
															$stmt->bind_param("s", $currentAdmin);
															$stmt->execute();
															$result = $stmt->get_result();

															if ($result->num_rows === 1) {
																$row = $result->fetch_assoc();
																$stored_md5_pwd = $row['password']; // Stored MD5 hashed password
													
																// Verify the old password using MD5 hashing
																if (md5($old_pass) === $stored_md5_pwd) {
																	if ($new_pass === $re_pass) {
																		// Hash the new password using MD5
																		$hashed_new_pass = md5($new_pass);

																		// Use prepared statement to update the MD5 hashed password
																		$update_stmt = $con->prepare("UPDATE admin SET password = ? WHERE email = ?");
																		$update_stmt->bind_param("ss", $hashed_new_pass, $currentAdmin);
																		$update_stmt->execute();
																		$update_stmt->close();

																		echo "<script>alert('Update Successfully'); window.location='change_password.php'</script>";
																	} else {
																		echo "<script>alert('Your new and Retype Password do not match'); window.location='change_password.php'</script>";
																	}
																} else {
																	echo "<script>alert('Your old password is incorrect'); window.location='change_password.php'</script>";
																}
															} else {
																// Handle the case when the user doesn't exist
																echo "<script>alert('User with email $currentAdmin not found'); window.location='change_password.php'</script>";
															}

															// Close the database connection
															$con->close();
														}
													} else {
														echo "<script>alert('Session not found. Please log in.'); window.location='login.php'</script>";
													}
													?>
													<form action="" method="POST">
														<h4 class="text-blue h5 mb-4">Change Your Password</h4>
														<ul class="change_password-edit-list row">
															<li class="weight-500 col-md-6">
																<div class="form-group">
																	<label for="oldPassword">Old Password</label>
																	<input class="form-control form-control-lg"
																		type="password" id="oldPass" name="oldPass"
																		required>
																</div>
																<div class="form-group">
																	<label for="newPassword">New Password</label>
																	<input class="form-control form-control-lg"
																		type="password" id="newPass" name="newPass"
																		required>
																</div>
																<div class="form-group">
																	<label for="newPassword">Re-Type Password</label>
																	<input class="form-control form-control-lg"
																		type="password" id="newPassword" name="rePass"
																		required>
																</div>
																<div class="form-group mb-0">
																	<input type="submit" class="btn btn-primary"
																		name="updatePassword" value="Update">
																</div>
															</li>
														</ul>
													</form>
												</div>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
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
	<script src="src/plugins/cropperjs/dist/cropper.js"></script>
	<script>
		window.addEventListener("DOMContentLoaded", function () {
			var image = document.getElementById("image");
			var cropBoxData;
			var canvasData;
			var cropper;

			$("#modal")
				.on("shown.bs.modal", function () {
					cropper = new Cropper(image, {
						autoCropArea: 0.5,
						dragMode: "move",
						aspectRatio: 3 / 3,
						restore: false,
						guides: false,
						center: false,
						highlight: false,
						cropBoxMovable: false,
						cropBoxResizable: false,
						toggleDragModeOnDblclick: false,
						ready: function () {
							cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
						},
					});
				})
				.on("hidden.bs.modal", function () {
					cropBoxData = cropper.getCropBoxData();
					canvasData = cropper.getCanvasData();
					cropper.destroy();
				});
		});
	</script>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
			style="display: none; visibility: hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
</body>

</html>