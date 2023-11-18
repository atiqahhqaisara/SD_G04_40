<?php
// Include the database connection file
include '../connection.php';

if (isset($_POST['addPromotion'])) {
	// Retrieve form data and sanitize
	$promotionName = $_POST['promotionName'];
	$startDate = $_POST['startDate'];
	$lastDate = !empty($_POST['lastDate']) ? $_POST['lastDate'] : null;
	$description = $_POST['description'];
	$promotion = $_POST['promotion'];

	// Handle the file upload
	$targetDirectory = "../promotion/"; // Specify the directory where you want to save uploaded files
	$targetFileName = basename($_FILES["image"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($targetFileName, PATHINFO_EXTENSION));

	// Check if the file is an actual image
	$check = getimagesize($_FILES["image"]["tmp_name"]);
	if ($check === false) {
		echo "File is not an image.";
		$uploadOk = 0;
	}

	// Check file size (you can adjust the size as needed)
	if ($_FILES["image"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}

	// Allow certain file formats (you can customize this list)
	if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
		echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "<script>alert('Sorry, your file was not uploaded!')</script>";
	} else {
		// If everything is ok, try to upload file
		$targetPath = $targetDirectory . $targetFileName;
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetPath)) {

			// SQL query to insert data into the 'promotion' table
			$sql = "INSERT INTO promotion (promotionName, startDate, lastDate, description, promotion, image) VALUES (?, ?, ?, ?, ?, ?)";

			// Create a prepared statement
			$stmt = mysqli_prepare($con, $sql);

			if ($stmt) {
				// Bind parameters and execute the statement
				mysqli_stmt_bind_param($stmt, "ssssss", $promotionName, $startDate, $lastDate, $description, $promotion, $targetFileName);

				if (mysqli_stmt_execute($stmt)) {
					// Data inserted successfully, redirect to the promotion list page
					echo "<script>alert('New Promotion Added!')</script>";
					echo "<script>window.location.href='promotionList.php'</script>";
					exit();
				} else {
					// Display MySQL error message
					echo "<script>alert('MySQL Error: " . mysqli_error($con) . "')</script>";
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