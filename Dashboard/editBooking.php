<?php
require 'controllerAdminData.php'
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Edit Staff</title>

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
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="vendors/images/deskapp-logo.svg" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
				<form>
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" class="form-control search-input" placeholder="Search Here">
						<div class="dropdown">
							<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
								<i class="ion-arrow-down-c"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">From</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">To</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Subject</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="text-right">
									<button class="btn btn-primary">Search</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						<span class="badge notification-active"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<ul>
								<li>
									<a href="#">
										<img src="vendors/images/img.jpg" alt="">
										<h3>John Doe</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="vendors/images/photo1.jpg" alt="">
										<h3>Lea R. Frith</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="vendors/images/photo2.jpg" alt="">
										<h3>Erik L. Richards</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="vendors/images/photo3.jpg" alt="">
										<h3>John Doe</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="vendors/images/photo4.jpg" alt="">
										<h3>Renee I. Hansen</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="vendors/images/img.jpg" alt="">
										<h3>Vicki M. Coleman</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
							</ul>
						</div>
					</div>
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
								echo '<img src="./profile/' . $profileImage . '" alt="Profile Image" class="user-icon">';
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
						<a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
						<a class="dropdown-item" href="index.php"><i class="dw dw-logout"></i> Log Out</a>
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
			<a href="dashboard_admin.php" >
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
						<a href="dashboard_admin.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
						</a>
					</li>
					
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-id-card"></span><span class="mtext">Staff</span>
						</a>
						<ul class="submenu">
							<li><a href="addStaff.php">Add Staff</a></li>
							<li><a href="staffList.php">Staff List</a></li>
						</ul>
					
					</li>
					<li>
						<a href="chat.html" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-chat3"></span><span class="mtext">Chat</span>
						</a>
					</li>

					<li>
						<div class="dropdown-divider"></div>
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
							<span class="micon fa fa-ticket"></span><span class="mtext">Ticket</span>
						</a>
						<ul class="submenu">
							<li><a href="addTicketPrice.php">Add Ticket</a></li>
							<li><a href="ticketList.php">Ticket List</a></li>
						</ul>
					
					</li>
	
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon ti-map"></span><span class="mtext">Event</span>
						</a>
						<ul class="submenu">
							<li><a href="addEvent.php">Add Event</a></li>
							<li><a href="eventList.php">Event List</a></li>
						</ul>
					
					</li>

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon ti-announcement"></span><span class="mtext">Promotion</span>
						</a>
						<ul class="submenu">
							<li><a href="addPromotion.php">Add Promotion</a></li>
							<li><a href="promotionList.php">Promotion List</a></li>
						</ul>
					
					</li>

					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon ti-announcement"></span><span class="mtext">Contact</span>
						</a>
						<ul class="submenu">
							<li><a href="addContact.php">Add PIC</a></li>
							<li><a href="contactList.php">PIC List</a></li>
						</ul>
					
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
								<h4>Edit Staff</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="staffList.php">Staff List</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Staff</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				
				<?php
                // Enable error reporting
                error_reporting(E_ALL);
                ini_set('display_errors', 1);

                include 'connection.php';

                $row = []; // Initialize $row as an empty array

                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    // Handle the POST request to update booking information
                    $bookingId = $_POST['bookingId'];
                    $bookingDate = $_POST['bookingDate'];
                    $fullName = $_POST['fullName'];
                    $phone = $_POST['phone'];
                    $MYadult = $_POST['MYadult'];
                    $MYchild = $_POST['MYchild'];
                    $MYsenior = $_POST['MYsenior'];
                    $Iadult = $_POST['Iadult'];
                    $Ichild = $_POST['Ichild'];
                    $Isenior = $_POST['Isenior'];

                    $sql = "UPDATE booking SET  
                            bookingDate=?, 
                            fullName=?, 
                            phone=?, 
                            MYadult=?, 
                            MYchild=?, 
                            MYsenior=?, 
                            Iadult=?, 
                            Ichild=?, 
                            Isenior=?
                            WHERE bookingId=?";
                    
                    $stmt = $con->prepare($sql);
                    
                    // Bind parameters
                    $stmt->bind_param("ssssssssss", $bookingDate, $fullName, $phone, $MYadult, $MYchild, $MYsenior, $Iadult, $Ichild, $Isenior, $bookingId);
                    
                    if ($stmt->execute()) {
                        // Update successful
                        echo '<script>window.location.href = "bookingList.php";</script>'; // Redirect using JavaScript
                        exit; // Terminate the script
                    } else {
                        // Error handling
                        echo "Error updating booking information: " . $stmt->error;
                    }
                    
                    $stmt->close();
                } elseif (isset($_GET['bookingId'])) {
                    // Handle the GET request to display booking information
                    $bookingId = $_GET['bookingId'];
                    $sql = "SELECT * FROM booking WHERE bookingId = ?";
                    $stmt = $con->prepare($sql);
                    
                    // Bind the bookingId parameter
                    $stmt->bind_param("s", $bookingId);
                    
                    if ($stmt->execute()) {
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            ?>
                            <form method="POST">
                                <input type="hidden" name="bookingId" value="<?= $row['bookingId']; ?>">

                                <div class="pd-20 card-box mb-30">
                                    <div class="clearfix">
                                        <div class="pull-left">
                                            <h4 class="text-blue h4">View Booking</h4>
                                            <p class="mb-30">View booking information</p>
                                        </div>
                                    </div>
                                    <!-- Add other form fields here using $row['fieldName'] -->
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Booking Date</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="text" name="bookingDate" value="<?= $row['bookingDate']; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Full Name</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="text" name="fullName" value="<?= $row['fullName']; ?>" >
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Phone Number</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="text" name="phone" value="<?= $row['phone']; ?>" >
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Malaysia Adult</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="text" name="MYadult" value="<?= $row['MYadult']; ?>" readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Malaysia Child</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="text" name="MYchild" value="<?= $row['MYchild']; ?>" readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Malaysia Senior</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="text" name="MYsenior" value="<?= $row['MYsenior']; ?>" readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">International Adult</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="text" name="Iadult" value="<?= $row['Iadult']; ?>" readonly>
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">International Child</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="text" name="Ichild" value="<?= $row['Ichild']; ?>" readonly>
                                        </div>
                                    </div>
									<div class="form-group row">International Senior</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="text" name="Isenior" value="<?= $row['Isenior']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 col-md-10 offset-md-2">
                                            <button type="submit" class="btn btn-primary">
                                                Update
                                            </button>
                                            <button type="button" onclick="window.location.href='bookingList.php'" class="btn btn-secondary">
                                                Back
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php
                        } else {
                            echo "<h4>No Such Booking Id Found</h4>";
                        }
                    } else {
                        echo "Error retrieving booking information: " . $stmt->error;
                    }
                    
                    $stmt->close();
                } else {
                    echo "Invalid request.";
                }

                $con->close();
                ?>

				

				<!-- Default Basic Forms End -->


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