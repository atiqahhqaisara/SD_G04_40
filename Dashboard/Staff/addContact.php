<?php
include '../connection.php';
if (isset($_POST['addPIC'])) {

	// Retrieve form data and sanitize
	$picName = $_POST['picName'];
	$picNum = $_POST['picNum'];
	$picEmail = $_POST['picEmail'];

	$sql = "INSERT INTO contact (picName,picNum,picEmail) 
							VALUES (?, ?, ?)";

	// Create a prepared statement
	$stmt = mysqli_prepare($con, $sql);


	if ($stmt) {
		// Bind parameters and execute the statement
		mysqli_stmt_bind_param($stmt, "sss", $picName, $picNum, $picEmail);

		if (mysqli_stmt_execute($stmt)) {
			echo "<script>alert('New PIC Added!')</script>";
			echo "<script>window.location.href='contactList.php'</script>";
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