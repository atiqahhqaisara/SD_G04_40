<?php
require '../controllerAdminData.php'
?>
<!DOCTYPE html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Staff Dashboard</title>
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
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
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
<body>
	<div class="header">
		<div class="header-left">
		<div class="menu-icon dw dw-menu"></div>
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
						<a class="dropdown-item" href="change_password.php"><i class="dw dw-password"></i> Change Password</a>
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
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
					</div>
				</div>
				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
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
						<a href="manageEnquiry.php" class="dropdown-toggle no-arrow">
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
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-50-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="vendors/images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back 
							<?php
							$currentAdmin = $_SESSION['email'];
							$sql = "SELECT * FROM admin WHERE email='$currentAdmin'";
							$result = $con->query($sql);
						if ($result && mysqli_num_rows($result) > 0) {
							$row = mysqli_fetch_assoc($result);
							$fullName = $row['fullName']; // Assuming the column name is 'fullName'
							echo '<div class="weight-600 font-30 text-blue">' . $fullName . '</div>';
						}	
						?>
						</h4>
						<p class="font-18 max-width-600">"Every challenge you face is an opportunity for growth, and with determination and resilience, you have the power to turn obstacles into stepping stones on your journey to success."</p>
					</div>
				</div>
			</div>
			<?php
			// Assuming you have a database connection established already
			// Get today's date in the format 'YYYY-MM-DD'
			$todayDate = date('Y-m-d');
			// Calculate the first day of the current month
			$firstDayOfMonth = date('Y-m-01');
			// Calculate the first day of the current year
			$firstDayOfYear = date('Y-01-01');
			// Fetch total number of bookings
			$sqlTotalBookings = "SELECT COUNT(*) AS totalBookings FROM booking WHERE status=1";
			$resultTotalBookings = $con->query($sqlTotalBookings);
			$rowTotalBookings = $resultTotalBookings->fetch_assoc();
			$totalBookings = $rowTotalBookings['totalBookings'];
			
			// Fetch daily data
			// Fetch daily data including the time
			$sqlDaily = "SELECT COUNT(*) AS dailyBookings, SUM(grandTotal) AS dailyRevenue FROM booking 
			WHERE orderDate >= '$todayDate 00:00:00' AND orderDate <= '$todayDate 23:59:59' AND status=1";
			$resultDaily = $con->query($sqlDaily);
			$rowDaily = $resultDaily->fetch_assoc();
			$dailyBookings = $rowDaily['dailyBookings'];
			$dailyRevenue = $rowDaily['dailyRevenue'];
			// Fetch monthly data
			$sqlMonthly = "SELECT COUNT(*) AS monthlyBookings, SUM(grandTotal) AS monthlyRevenue FROM booking WHERE orderDate >= '$firstDayOfMonth' AND status=1";
			$resultMonthly = $con->query($sqlMonthly);
			$rowMonthly = $resultMonthly->fetch_assoc();
			$monthlyBookings = $rowMonthly['monthlyBookings'];
			$monthlyRevenue = $rowMonthly['monthlyRevenue'];
			// Fetch annual data
			$sqlAnnual = "SELECT COUNT(*) AS annualBookings, SUM(grandTotal) AS annualRevenue FROM booking WHERE orderDate >= '$firstDayOfYear' AND status=1";
			$resultAnnual = $con->query($sqlAnnual);
			$rowAnnual = $resultAnnual->fetch_assoc();
			$annualBookings = $rowAnnual['annualBookings'];
			$annualRevenue = $rowAnnual['annualRevenue'];
			?>
			<div class="row">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo $totalBookings; ?></div>
								<div class="weight-600 font-14">Total Bookings</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="widget-data">
								<?php if ($dailyRevenue !== null) : ?>
									<div class="h4 mb-0">RM <?php echo number_format($dailyRevenue, 2); ?></div>
								<?php else : ?>
									<div class="h4 mb-0">RM 0.00</div>
								<?php endif; ?>
								<div class="weight-600 font-14">Daily Sales</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="widget-data">
								<?php if ($monthlyRevenue !== null) : ?>
									<div class="h4 mb-0">RM <?php echo number_format($monthlyRevenue, 2); ?></div>
								<?php else : ?>
									<div class="h4 mb-0">RM 0.00</div>
								<?php endif; ?>
								<div class="weight-600 font-14">Monthly Sales</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="widget-data">
								<?php if ($annualRevenue !== null) : ?>
									<div class="h4 mb-0">RM <?php echo number_format($annualRevenue, 2); ?></div>
								<?php else : ?>
									<div class="h4 mb-0">RM 0.00</div>
								<?php endif; ?>
								<div class="weight-600 font-14">Annual Sales</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
					Zoo Negara Admin Dashboard
				</div>
			</div>
		</div>
			
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard.js"></script>
</body>
</html>
