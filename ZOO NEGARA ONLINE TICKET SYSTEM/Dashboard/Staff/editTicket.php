<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../connection.php';

$row = []; // Initialize $row as an empty array

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	// Handle the POST request to update administrator information
	$ticketId = $_POST['ticketId'];
	$visitor = $_POST['visitor'];
	$category = $_POST['category'];
	$price = $_POST['price'];

	$sql = "UPDATE ticket SET  
			visitor=?, 
			category=?, 
			price=?
			WHERE ticketId=?";

	$stmt = $con->prepare($sql);

	// Bind parameters
	$stmt->bind_param("ssss", $visitor, $category, $price, $ticketId);

	if ($stmt->execute()) {
		// Update successful
		echo "<script>alert('Ticket Record Updated!')</script>";
		echo '<script>window.location.href = "ticketList.php";</script>'; // Redirect using JavaScript
		exit; // Terminate the script
	} else {
		// Error handling
		echo "Error updating administrator information: " . $stmt->error;
	}

	$stmt->close();
} elseif (isset($_GET['ticketId'])) {
	// Handle the GET request to display administrator information
	$ticketId = $_GET['ticketId'];
	$sql = "SELECT * FROM ticket WHERE ticketId = ?";
	$stmt = $con->prepare($sql);

	// Bind the email parameter
	$stmt->bind_param("s", $ticketId);

	if ($stmt->execute()) {
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
		} else {
			echo "Ticket not found.";
		}
	} else {
		echo "Error retrieving ticket information: " . $stmt->error;
	}

	$stmt->close();
} else {
	echo "Invalid request.";
}

$con->close();
?>