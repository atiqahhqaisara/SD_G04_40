<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connection.php';

$row = []; // Initialize $row as an empty array

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	// Handle the POST request to update promotion information
	$missionId = $_POST['missionId']; // Retrieve visionId
	$mission = $_POST['mission'];

	// File uploaded successfully, update promotion information
	$sql = "UPDATE aboutmission SET  
								mission=? 
								WHERE missionId=?";

	$stmt = $con->prepare($sql);

	// Bind parameters
	$stmt->bind_param("si", $mission, $missionId);

	if ($stmt->execute()) {
		// Update successful
		echo "<script>alert('Mission Information Updated!')</script>";
		echo '<script>window.location.href = "missionList.php";</script>'; // Redirect using JavaScript
		exit; // Terminate the script
	} else {
		// Error handling
		echo "<script>alert('Error updating mission information: ' . $stmt->error . '')</script>";
	}

	$stmt->close();
} elseif (isset($_GET['missionId'])) {
	// Handle the GET request to display promotion information
	$missionId = $_GET['missionId'];
	$sql = "SELECT * FROM aboutmission WHERE missionId = ?";
	$stmt = $con->prepare($sql);

	// Bind the visionId parameter
	$stmt->bind_param("i", $missionId);

	if ($stmt->execute()) {
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
		} else {
			echo "Mission not found.";
		}
	} else {
		echo "Error retrieving mission information: " . $stmt->error;
	}

	$stmt->close();
} else {
	echo "Invalid request.";
}

$con->close();
?>
