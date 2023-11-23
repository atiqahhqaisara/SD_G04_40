<?php
require '../controllerAdminData.php';
// Check if the form is submitted
if (isset($_POST['contactReply'])) {
    // Retrieve form data
    $enquiryId = $_POST['enquiryId'];
    $email = isset($_POST['email']) ? $_POST['email'] : ''; // Check if 'email' is set
    $phone = isset($_POST['phone']) ? $_POST['phone'] : ''; // Check if 'phone' is set
    $message = $_POST['message'];
    // Assuming you have the $enquiryId value available from your form or somewhere else
$enquiryId = $_POST['enquiryId']; // Update this line with the appropriate source of enquiryId
// Use prepared statements to prevent SQL injection
$insertReplyQuery = "INSERT INTO reply (enquiryId, email, phone, message) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($con, $insertReplyQuery);
if ($stmt) {
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "isss", $enquiryId, $email, $phone, $message);
    // Execute the statement
    $replyResult = mysqli_stmt_execute($stmt);
    if ($replyResult) {
        // Update the status in the 'enquiry' table to mark it as replied
        $updateStatusQuery = "UPDATE enquiry SET status = 1 WHERE enquiryId = ?";
        $stmtUpdateStatus = mysqli_prepare($con, $updateStatusQuery);
        if ($stmtUpdateStatus) {
            // Bind parameters
            mysqli_stmt_bind_param($stmtUpdateStatus, "i", $enquiryId);
            // Execute the statement to update status
            mysqli_stmt_execute($stmtUpdateStatus);
            // Close the statement
            mysqli_stmt_close($stmtUpdateStatus);
        }
        // Insert successful, you can perform additional actions if needed
        echo '<script>alert("Reply sent successfully!");</script>';
    } else {
        // Insert failed, handle the error
        echo '<script>alert("Failed to send reply. Please try again.");</script>';
    }
    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Statement preparation failed, handle the error
    echo '<script>alert("Failed to prepare statement. Please try again.");</script>';
}
}
// Fetch messages from the 'enquiry' table
$selectMessagesQuery = "SELECT * FROM enquiry";
$resultMessages = mysqli_query($con, $selectMessagesQuery);
?>
<!DOCTYPE html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Manage Enquiry</title>
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
                            <h4>Manage Enquiry</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Enquiry</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <a class="btn btn-primary" href="replyHistory.php">History</a>
                    </div>
                </div>
            </div>
      
			<?php
			include '../connection.php';
			// Replace with your SQL query to fetch data
			$selectMessagesQuery = "SELECT * FROM enquiry";
			$result = $con->query($selectMessagesQuery);
			if ($result->num_rows > 0) {
				echo "<div class='card-box mb-30'>";
				echo "<div class='pd-20'>";
				echo "<h4 class='text-blue h4'>Message List</h4>";
				echo "</div>";
				echo "<div class='pb-20'>";
				echo "<table class='data-table table stripe hover nowrap'>";
				echo "<thead>";
				echo "<tr>";
				echo "<th class='table-plus datatable-nosort'>Id</th>";
				echo "<th class='table-plus datatable-nosort'>Email</th>";
				echo "<th class='table-plus datatable-nosort'>Phone No</th>";
				echo "<th class='table-plus datatable-nosort'>Message</th>";
				echo "<th class='table-plus datatable-nosort'>Status</th>";
				echo "<th class='datatable-nosort'>Action</th>";
				echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
				while ($row = $result->fetch_assoc()) {
					$enquiryId = $row['enquiryId'];
					$email = $row['email'];
					$phone = $row['phone'];
					$message = $row['message'];
					$status = $row['status'];
					// Only display the row if the status is 0
					if ($status == 0) {
						echo "<tr>";
						echo "<td>" . $enquiryId . "</td>";
						echo "<td class='table-plus'>" . $email . "</td>";
						echo "<td class='table-plus'>" . $phone . "</td>";
						echo "<td class='table-plus'>" . $message . "</td>";
						echo "<td class='table-plus'>" . $status . "</td>";
						echo "<td>
									<button class='btn btn-sm btn-primary' type='button' data-toggle='modal' data-target='#reply{$enquiryId}'>Reply</button>
								</td>";
						echo "</tr>";
						// Modal should be placed outside the loop
						echo '
						<div class="modal fade" id="reply' . $enquiryId . '" tabindex="-1" role="dialog" aria-labelledby="reply' . $enquiryId . '" aria-hidden="true">
							<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header" style="background-color: rgb(111 202 203);">
										<h5 class="modal-title" id="reply' . $enquiryId . '">Reply (Contact Id: ' . $enquiryId . ')</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="" method="post">
											<div class="text-left my-2">
												<b><label for="message">Message: </label></b>
												<textarea class="form-control" id="message" name="message" rows="2" required minlength="5"></textarea>
											</div>
											<input type="hidden" name="enquiryId" value="' . $enquiryId . '">
											<input type="hidden" name="email" value="' . $email . '">
											<input type="hidden" name="phone" value="' . $phone . '">
											<button type="submit" class="btn btn-success" name="contactReply">Reply</button>
										</form>
									</div>
								</div>
							</div>
						</div>';
					}
				}
				echo "</tbody>";
				echo "</table>";
				echo "</div>";
				echo "</div>";
			} else {
				echo "No messages found.";
			}
			?>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	
</body>
</html>
