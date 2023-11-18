<?php
include '../connection.php';

if (isset($_GET['ticketId'])) {
	$ticketId = mysqli_real_escape_string($con, $_GET['ticketId']);
	$query = "SELECT * FROM ticket WHERE ticketId='$ticketId' ";
	$query_run = mysqli_query($con, $query);

	if (mysqli_num_rows($query_run) > 0) {
		$ticket = mysqli_fetch_array($query_run);

	} else {
		echo "<h4>No Such Ticket Id Found</h4>";
	}
} else {
	echo "Invalid request.";
}

$con->close();
?>