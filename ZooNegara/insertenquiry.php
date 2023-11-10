<?php
$enquiry = $_POST['enquiry'];

if (!empty($enquiry)) {
    $host = "localhost";
    $dbUsername = "zoonegara";
    $dbPassword = "";
    $dbname = "g04_40";

    // Create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    } else {
        $INSERT = "INSERT INTO enquiry (enquiry) VALUES (?)";

        // Prepare statement
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("s", $enquiry);
        $stmt->execute();
        echo "New record inserted successfully";

        $stmt->close();
        $conn->close();

         // Redirect to contactCustomer.php
        header("Location: contactCustomer.php");
        exit(); // Ensure that no other code is executed after the redirect
    }
}
?>
