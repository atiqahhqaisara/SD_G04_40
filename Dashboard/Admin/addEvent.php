<?php
// Include the database connection file
include '../connection.php';

if (isset($_POST['addEvent'])) {
	// Retrieve form data and sanitize
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
	if (isset($_POST["addEvent"])) {
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if ($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo '<script>alert("File is not an image."); 
							window.location.href = "addEvent.php";</script>';
			$uploadOk = 0;
		}
	}

	// Check file size (you can adjust the size as needed)
	if ($_FILES["image"]["size"] > 500000) {
		echo '<script>alert("Sorry, your file is too large."); 
						window.location.href = "addEvent.php";</script>';
		$uploadOk = 0;
	}

	// Allow certain file formats (you can customize this list)
	if (
		$imageFileType != "jpg" &&
		$imageFileType != "png" &&
		$imageFileType != "jpeg" &&
		$imageFileType != "gif"
	) {
		echo '<script>alert("Sorry, only JPG, JPEG, PNG, and GIF files are allowed."); 
						window.location.href = "addEvent.php";</script>';

		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	} else {
		// If everything is ok, try to upload file
		$targetPath = $targetDirectory . $targetFileName;
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetPath)) {
			// SQL query to insert data into the 'event' table
			$sql = "INSERT INTO event (eventName, eventDate, lastDate, description, image) VALUES (?, ?, ?, ?, ?)";

			// Create a prepared statement
			$stmt = mysqli_prepare($con, $sql);

			if ($stmt) {
				// Bind parameters and execute the statement
				mysqli_stmt_bind_param($stmt, "sssss", $eventName, $eventDate, $lastDate, $description, $targetFileName);

				if (mysqli_stmt_execute($stmt)) {
					// Data inserted successfully, redirect to the event list page
					echo "<script>alert('New Event Added!')</script>";
					echo "<script>window.location.href='eventList.php'</script>";
					exit();
				} else {
					// Display MySQL error message
					echo "<script>alert('MySQL Error!')</script>";
				}

				// Close the statement
				mysqli_stmt_close($stmt);
			} else {
				// Display an error message for the failed statement creation
				echo "<script>alert('Error creating prepared statement!')</script>";
			}
		} else {
			echo "<script>alert('Sorry, there was an error uploading your file!')</script>";
		}
	}
}

// Close the database connection
mysqli_close($con);
?>