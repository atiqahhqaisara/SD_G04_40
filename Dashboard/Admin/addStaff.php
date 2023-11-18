<?php
// Include the database connection file (connection.php)
include '../connection.php';

// Check if the form is submitted
if (isset($_POST['addStaff'])) {

	// Retrieve form data and sanitize
	$fullName = $_POST['fullName'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$position = $_POST['position'];
	$address = $_POST['address'];
	$postal = $_POST['postal'];
	$district = $_POST['district'];
	$states = $_POST['states'];
	$password = md5($_POST['password']);

	// Construct the SQL query to insert the staff record using prepared statements
	$sql = "INSERT INTO admin (fullName, phone, email, position, address, postal, district, states, password) 
							VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

	// Create a prepared statement
	$stmt = mysqli_prepare($con, $sql);


	if ($stmt) {
		// Bind parameters and execute the statement
		mysqli_stmt_bind_param($stmt, "sssssssss", $fullName, $phone, $email, $position, $address, $postal, $district, $states, $password);

		if (mysqli_stmt_execute($stmt)) {
			// Redirect to home page
			echo "<script>alert('New Staff Added Successfully!')</script>";
			echo '<script>location.href = "staffList.php";</script>';

			exit();
		} else {
			echo "<script>alert('Something went wrong, try again...')</script>";

		}

		// Close the statement
		mysqli_stmt_close($stmt);
	}
}
// Close the database connection
mysqli_close($con);
?>