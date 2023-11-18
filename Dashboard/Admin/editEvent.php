<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../connection.php';

$row = []; // Initialize $row as an empty array

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	// Handle the POST request to update event information
	$eventId = $_POST['eventId'];
	$eventName = $_POST['eventName'];
	$eventDate = $_POST['eventDate'];
	$lastDate = !empty($_POST['lastDate']) ? $_POST['lastDate'] : null;
	$description = $_POST['description'];

	// Handle the file upload
	$targetDirectory = "../zoo/"; // Specify the directory where you want to save uploaded files
	$targetFileName = basename($_FILES["image"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($targetFileName, PATHINFO_EXTENSION));

	// Check if the file is an actual image
	$check = getimagesize($_FILES["image"]["tmp_name"]);
	if ($check !== false) {
		$uploadOk = 1;
	} else {
		$uploadOk = 0;
	}

	// Check file size (you can adjust the size as needed)
	if ($_FILES["image"]["size"] > 500000) {
		$uploadOk = 0;
	}

	// Allow certain file formats (you can customize this list)
	if (
		$imageFileType != "jpg" &&
		$imageFileType != "png" &&
		$imageFileType != "jpeg" &&
		$imageFileType != "gif"
	) {
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "<script>alert('Sorry, your file was not uploaded!')</script>";

	} else {
		// If everything is ok, try to upload file
		$targetPath = $targetDirectory . $targetFileName;
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetPath)) {
			// File uploaded successfully, update event information
			$sql = "UPDATE event SET  
					eventName=?, 
					eventDate=?, 
					lastDate=?,
					description=?,
					image=?
					WHERE eventId=?";

			$stmt = $con->prepare($sql);

			// Bind parameters
			$stmt->bind_param("ssssss", $eventName, $eventDate, $lastDate, $description, $targetFileName, $eventId);

			if ($stmt->execute()) {
				// Update successful
				echo "<script>alert('Event Information Updated!')</script>";
				echo '<script>window.location.href = "eventList.php";</script>'; // Redirect using JavaScript
				exit; // Terminate the script
			} else {
				// Error handling
				echo "<script>alert('Error updating event information!')</script>";
			}

			$stmt->close();
		} else {
			echo "<script>alert('Sorry, there was an error uploading your file!')</script>";
		}
	}
} elseif (isset($_GET['eventId'])) {
	// Handle the GET request to display event information
	$eventId = $_GET['eventId'];
	$sql = "SELECT * FROM event WHERE eventId = ?";
	$stmt = $con->prepare($sql);

	// Bind the eventId parameter
	$stmt->bind_param("s", $eventId);

	if ($stmt->execute()) {
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
		} else {
			echo "<script>alert('Event not found!')</script>";

		}
	} else {
		echo "<script>alert('Error retrieving event information!')</script>";

	}

	$stmt->close();
} else {
	echo "<script>alert('Invalid request!')</script>";

}

$con->close();
?>