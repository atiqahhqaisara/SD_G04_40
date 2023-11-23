<?php
require '../controllerAdminData.php'
?>
<!DOCTYPE html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Promotion List</title>
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
								<h4>Promotion List</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard_admin.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Promotion List</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<button class="btn btn-primary" data-toggle="modal" data-target="#addPromotionModal">Add Promotion</button>
                    	</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<?php
				include '../connection.php';
				// Replace with your SQL query to fetch data
				$sql = "SELECT * FROM promotion";
				$result = $con->query($sql);
				if ($result->num_rows > 0) {
					echo "<div class='card-box mb-30'>";
					echo "<div class='pd-20'>";
					echo "<h4 class='text-blue h4'>Promotion List</h4>";
					echo "</div>";
					echo "<div class='pb-20'>";
					echo "<table class='data-table table stripe hover nowrap'>";
					echo "<thead>";
					echo "<tr>";
                    echo "<th class='table-plus datatable-nosort'>No.</th>";
                    echo "<th class='table-plus datatable-nosort'>Promotion Id</th>";
					echo "<th class='table-plus datatable-nosort'>Promotion Name</th>";
					echo "<th class='datatable-nosort'>Action</th>";
					echo "</tr>";
					echo "</thead>";
					echo "<tbody>";
					 $rowNumber = 1; // Initialize the row number
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $rowNumber . "</td>";
                        echo "<td class='table-plus'>" . $row["promotionId"] . "</td>";
						echo "<td class='table-plus'>" . $row["promotionName"] . "</td>";
                        echo "<td>
						<button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#viewPromo{$rowNumber}'>View</button>
						<button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#editPromo{$rowNumber}'>Edit</button>
				
                            <a href='deletePromotion.php?promotionId=" . $row["promotionId"] . "' class='btn btn-info btn-sm'>Delete</a>
                        </td>";
                        echo "</tr>";
						echo '
						<div class="modal fade" id="addPromotionModal" tabindex="-1" role="dialog" aria-labelledby="addPromotionModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="text-blue h4" id="addPromotionModalLabel">Add Promotion</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="addPromotion.php" method="POST" enctype="multipart/form-data">
											<div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">Promotion Name</label>
												<div class="col-sm-12 col-md-10">
													<input class="form-control" type="text" name="promotionName" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">Promotion Date</label>
												<div class="col-sm-12 col-md-10">
													<input class="form-control" type="date" name="startDate" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">Last Date</label>
												<div class="col-sm-12 col-md-10">
													<input class="form-control" type="date" name="lastDate">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">Description of the Promotion</label>
												<div class="col-sm-12 col-md-10">
													<textarea class="form-control" type="text" name="description" required></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">Promotion</label>
												<div class="col-sm-12 col-md-10">
													<input class="form-control" type="text" name="promotion" required>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-12 col-md-2 col-form-label">Promotion Image</label>
												<div class="col-sm-12 col-md-10">
													<input class="form-control" type="file" name="image">
												</div>
											</div>
											<div class="form-group row">
												<div class="col-sm-12 col-md-10 offset-md-2">
													<button type="submit" class="btn btn-primary" name="addPromotion">Add Promotion</button>
												</div>
											</div>
										</form>
									</div>
									<!-- You can add a footer here if needed -->
								</div>
							</div>
						</div>';
						echo "
						<!-- View Promotion Modal -->
						<div class='modal fade' id='viewPromo{$rowNumber}' tabindex='-1' role='dialog' aria-labelledby='viewPromoModalLabel{$rowNumber}' aria-hidden='true'>
							<div class='modal-dialog' role='document'>
								<div class='modal-content'>
									<div class='modal-header'>
										<h4 class='text-blue h4' id='viewPromoModalLabel{$rowNumber}'>View Promotion</h4>
										<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											<span aria-hidden='true'>&times;</span>
										</button>
									</div>
									<div class='modal-body'>
										<!-- Your Form Content Goes Here -->
										<form method='POST' action='viewPromotion.php'>
											<input type='hidden' name='promotionId' value='{$row['promotionId']}'>
											<div class='form-group row'>
												<label class='col-sm-12 col-md-2 col-form-label'>Promotion Id</label>
												<div class='col-sm-12 col-md-10'>
													<input class='form-control' type='number' name='promotionId' value='{$row['promotionId']}' readonly>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-sm-12 col-md-2 col-form-label'>Promotion Name</label>
												<div class='col-sm-12 col-md-10'>
													<input class='form-control' type='text' name='promotionName' value='{$row['promotionName']}' readonly>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-sm-12 col-md-2 col-form-label'>Promotion Date</label>
												<div class='col-sm-12 col-md-10'>
													<input class='form-control' type='date' name='startDate' value='{$row['startDate']}' readonly>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-sm-12 col-md-2 col-form-label'>Last Date</label>
												<div class='col-sm-12 col-md-10'>
													<input class='form-control' type='date' name='lastDate' value='{$row['lastDate']}' readonly>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-sm-12 col-md-2 col-form-label'>Promotion Description</label>
												<div class='col-sm-12 col-md-10'>
													<textarea class='form-control' name='description' readonly>{$row['description']}</textarea>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-sm-12 col-md-2 col-form-label'>Promotion Image</label>
												<div class='col-sm-12 col-md-10'>
													<input class='form-control' type='text' name='image' value='{$row['image']}' readonly>
												</div>
											</div>
											<div class='form-group row'>
												<div class='col-sm-12 col-md-10 offset-md-2'>
												<button type='button' data-dismiss='modal' class='btn btn-secondary'>
														Back
													</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>";
						echo "
						<!-- Edit Promotion Modal -->
						<div class='modal fade' id='editPromo{$rowNumber}' tabindex='-1' role='dialog' aria-labelledby='editPromoModalLabel{$rowNumber}' aria-hidden='true'>
							<div class='modal-dialog' role='document'>
								<div class='modal-content'>
									<div class='modal-header'>
										<h4 class='text-blue h4' id='editPromoModalLabel{$rowNumber}'>Edit Promotion</h4>
										<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
											<span aria-hidden='true'>&times;</span>
										</button>
									</div>
									<div class='modal-body'>
										<!-- Your Form Content Goes Here -->
										<form action='editPromotion.php' method='POST' enctype='multipart/form-data'>
											<div class='form-group row'>
												<label class='col-sm-12 col-md-2 col-form-label'>Promotion Id</label>
												<div class='col-sm-12 col-md-10'>
													<input class='form-control' type='text' name='promotionId' value='{$row['promotionId']}' readonly>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-sm-12 col-md-2 col-form-label'>Promotion Name</label>
												<div class='col-sm-12 col-md-10'>
													<input class='form-control' type='text' name='promotionName' value='{$row['promotionName']}'>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-sm-12 col-md-2 col-form-label'>Promotion Date</label>
												<div class='col-sm-12 col-md-10'>
													<input class='form-control' type='date' name='startDate' value='{$row['startDate']}'>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-sm-12 col-md-2 col-form-label'>Last Date</label>
												<div class='col-sm-12 col-md-10'>
													<input class='form-control' type='date' name='lastDate' value='{$row['lastDate']}'>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-sm-12 col-md-2 col-form-label'>Description of the Promotion</label>
												<div class='col-sm-12 col-md-10'>
													<textarea class='form-control' type='text' name='description'>{$row['description']}</textarea>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-sm-12 col-md-2 col-form-label'>Promo</label>
												<div class='col-sm-12 col-md-10'>
													<input class='form-control' type='text' name='promotion' value='{$row['promotion']}'>
												</div>
											</div>
											<div class='form-group row'>
												<label class='col-sm-12 col-md-2 col-form-label'>Promotion Image</label>
												<div class='col-sm-12 col-md-10'>
													<input class='form-control' type='file' name='image'>
												</div>
											</div>
											<div class='form-group row'>
												<div class='col-sm-12 col-md-10 offset-md-2'>
													<button type='submit' class='btn btn-primary'>
														Update
													</button>
													<button type='button' data-dismiss='modal' class='btn btn-secondary'>
														Back
													</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>";
                        $rowNumber++;
                    }
					echo "</tbody>";
					echo "</table>";
					echo "</div>";
					echo "</div>";
				}
				$con->close();
				?>
				<!-- Simple Datatable End -->
				
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script></body>
</html>
