<?php
require '../controllerAdminData.php'
?>
<!DOCTYPE html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Sales Report</title>

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
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Sales Report</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Sales Report</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-md-12 col-sm-12 mb-30">
						<div class="pd-20 card-box">
							<h5 class="h4 text-blue mb-20">Sales Report</h5>
							<?php
							include "../connection.php";

							// Initialize totals with default values
							$selectedMonth = "";
							$selectedYear = "";
							$myAdultTotal = 0;
							$myChildTotal = 0;
							$mySeniorTotal = 0;
							$iAdultTotal = 0;
							$iChildTotal = 0;
							$iSeniorTotal = 0;
							$totalSales = 0;

							if ($_SERVER["REQUEST_METHOD"] == "POST") {
								// Debugging: Check if $_POST['selectedMonth'] and $_POST['selectedYear'] are set
								if (isset($_POST['selectedMonth']) && isset($_POST['selectedYear'])) {
									$selectedMonth = $_POST['selectedMonth'];
									$selectedYear = $_POST['selectedYear'];

									// Check connection
									if ($con->connect_error) {
										die("Connection failed: " . $con->connect_error);
									}

									// Fetch data from the database
									$sql = "SELECT MYadult, MYchild, MYsenior, Iadult, Ichild, Isenior, grandTotal, status
									FROM booking 
									WHERE DATE_FORMAT(orderDate, '%Y-%m') = '$selectedYear-$selectedMonth' AND status='1'";
									$result = $con->query($sql);

									// Check for SQL errors and fetch data
									if (!$result) {
										die("SQL Error: " . $con->error);
									} elseif ($result->num_rows === 0) {
	
									} else {
										// Calculate totals and total sales
										while ($row = $result->fetch_assoc()) {
											$myAdultTotal += $row['MYadult'];
											$myChildTotal += $row['MYchild'];
											$mySeniorTotal += $row['MYsenior'];
											$iAdultTotal += $row['Iadult'];
											$iChildTotal += $row['Ichild'];
											$iSeniorTotal += $row['Isenior'];

											// Calculate total sales
											$totalSales += $row['grandTotal'];
										}
									}

									// Close the database connection
									$con->close();
								}
							}
							?>

							<form method="post" action="" onsubmit="return validateForm()">
								<div class="row">
									<div class="form-group col-md-3">
										<label for="selectedMonth">Month</label>
										<select class="form-control" name="selectedMonth" id="selectedMonth">
										<option value="01">January</option>
											<option value="02">February</option>
											<option value="03">March</option>
											<option value="04">April</option>
											<option value="05">May</option>
											<option value="06">June</option>
											<option value="07">July</option>
											<option value="08">August</option>
											<option value="09">September</option>
											<option value="10">October</option>
											<option value="11">November</option>
											<option value="12">December</option>
										</select>
									</div>

									<div class="form-group col-md-3">
										<label for="selectedYear">Year</label>
										<select class="form-control" name="selectedYear" id="selectedYear">
										<?php
											// Use PHP to dynamically generate options for the years
											$currentYear = date("Y");
											for ($i = $currentYear; $i >= $currentYear - 10; $i--) {
												echo "<option value=\"$i\">$i</option>";
											}
											?>
										</select>
									</div>

									<div class="form-group col-md-3">
									<label>&nbsp;</label>
                       				 <br>
										<button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
									</div>
								</div>
							</form>
							<hr>
							<div class="pb-20">
								<table class="table hover multiple-select-row data-table-export nowrap">
								<h5 class="h4 text-blue mb-20"><?php echo isset($selectedMonth) && isset($selectedYear) ? $selectedMonth . " " . $selectedYear : ""; ?></h5>

									<thead>
										<tr>
											<th>MY Adult</th>
											<th>MY Child</th>
											<th>MY Senior</th>
											<th>I Adult</th>
											<th>I Child</th>
											<th>I Senior</th>
											<th>Total Sales</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?php echo $myAdultTotal; ?></td>
											<td><?php echo $myChildTotal; ?></td>
											<td><?php echo $mySeniorTotal; ?></td>
											<td><?php echo $iAdultTotal; ?></td>
											<td><?php echo $iChildTotal; ?></td>
											<td><?php echo $iSeniorTotal; ?></td>
											<td><?php echo "RM ".$totalSales; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>


	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>

	<script>
    // Validation function
    function validateForm() {
        var selectedMonth = document.getElementById("selectedMonth").value;
        var selectedYear = document.getElementById("selectedYear").value;

        if (selectedMonth === "" || selectedYear === "") {
            alert("Please select both month and year.");
            return false;
        }

        // If validation passes, the form will submit
        return true;
    }
</script>
	

</body>
</html>