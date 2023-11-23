<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../connection.php';

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

