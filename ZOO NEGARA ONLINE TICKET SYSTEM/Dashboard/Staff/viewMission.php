<?php
include 'connection.php';

if (isset($_GET['missionId'])) {
	$missionId = mysqli_real_escape_string($con, $_GET['missionId']);
	$query = "SELECT * FROM aboutmission WHERE missionId='$missionId' ";
	$query_run = mysqli_query($con, $query);

	if (mysqli_num_rows($query_run) > 0) {
		$mission = mysqli_fetch_array($query_run);

	} else {
		echo "<h4>No Such Mission Id Found</h4>";
	}
} else {
	echo "Invalid request. GET parameters: ";
	var_dump($_GET);
}

$con->close();
?>