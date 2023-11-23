<?php
include '../connection.php';
if (isset($_GET['promotionId'])) {
	$promotionId = mysqli_real_escape_string($con, $_GET['promotionId']);
	$query = "SELECT * FROM promotion WHERE promotionId='$promotionId' ";
	$query_run = mysqli_query($con, $query);
	if (mysqli_num_rows($query_run) > 0) {
		$promotion = mysqli_fetch_array($query_run);
	} else {
		echo "<h4>No Such Event Id Found</h4>";
	}
} else {
	echo "Invalid request.";
}
$con->close();
?>
