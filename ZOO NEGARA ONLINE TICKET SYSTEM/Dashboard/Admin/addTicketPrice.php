<?php
include '../connection.php';
if (isset($_POST['addTicket'])) {
	// Retrieve form data and sanitize
	$visitor = $_POST['visitor'];
	$category = $_POST['category'];
	$price = $_POST['price'];
	$sql = "INSERT INTO ticket (visitor,category,price) 
							VALUES (?, ?, ?)";
	// Create a prepared statement
	$stmt = mysqli_prepare($con, $sql);
	if ($stmt) {
		// Bind parameters and execute the statement
		mysqli_stmt_bind_param($stmt, "sss", $visitor, $category, $price);
		if (mysqli_stmt_execute($stmt)) {
			echo "<script>alert('New Ticket Added!')</script>";
			echo "<script>window.location.href='ticketList.php'</script>";
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
