<?php
include '../connection.php';

if (isset($_GET['picId'])) {
    $picId = $_GET['picId'];

    // Prepare the SQL statement
    $query = "SELECT * FROM contact WHERE picId = ?";
    $stmt = $con->prepare($query);

    // Bind the parameter
    $stmt->bind_param("s", $picId);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if a row is found
    if ($result->num_rows > 0) {
        $pic = $result->fetch_assoc();
    } else {
        echo "<h4>No Such PIC Id Found</h4>";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Invalid request.";
}

// Close the database connection
$con->close();
?>
