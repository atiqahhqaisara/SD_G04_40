<?php
include '../connection.php';

if (isset($_GET['bookingId'])) {
	$bookingId = mysqli_real_escape_string($con, $_GET['bookingId']);
	$query = "SELECT * FROM booking WHERE bookingId='$bookingId' ";
	$query_run = mysqli_query($con, $query);

	if (mysqli_num_rows($query_run) > 0) {
		$booking = mysqli_fetch_array($query_run);
	} else {
		echo "<h4>No Such Booking Id Found</h4>";
	}
} else {
	echo "Invalid request.";
}

$con->close();
?>