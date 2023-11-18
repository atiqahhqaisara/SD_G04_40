<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../connection.php';

$row = []; // Initialize $row as an empty array

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Handle the file upload
    $targetDirectory = "../promotion/"; // Specify the directory where you want to save uploaded files
    $targetFileName = basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFileName, PATHINFO_EXTENSION));

    // Check if the file is an actual image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Check file size (you can adjust the size as needed)
    if ($_FILES["image"]["size"] > 500000) {
        $uploadOk = 0;
    }

    // Allow certain file formats (you can customize this list)
    if (
        $imageFileType != "jpg" &&
        $imageFileType != "png" &&
        $imageFileType != "jpeg" &&
        $imageFileType != "gif"
    ) {
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded!')</script>";

    } else {
        // Make sure the directory exists
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }

        // If everything is ok, try to upload file
        $targetPath = $targetDirectory . $targetFileName;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetPath)) {
            // File uploaded successfully, update promotion information
            $sql = "UPDATE promotion SET  
        promotionName=?, 
        startDate=?, 
        lastDate=?,
        description=?,
        promotion=?,
        image=?
        WHERE promotionId=?";

            $stmt = $con->prepare($sql);

            // Bind parameters
            $stmt->bind_param("ssssssi", $promotionName, $startDate, $lastDate, $description, $promotion, $targetPath, $promotionId);

            if ($stmt->execute()) {
                // Update successful
                echo "<script>alert('Promotion Information Updated!')</script>";
                echo '<script>window.location.href = "promotionList.php";</script>'; // Redirect using JavaScript
                exit; // Terminate the script
            } else {
                // Error handling
                echo "<script>alert('Error updating promotion information: '. $stmt->error .'!')</script)";
            }

            $stmt->close();
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file!')</script>";
        }
    }

} elseif (isset($_GET['promotionId'])) {
    // Handle the GET request to display promotion information
    $promotionId = $_GET['promotionId'];
    $sql = "SELECT * FROM promotion WHERE promotionId = ?";
    $stmt = $con->prepare($sql);

    // Bind the promotionId parameter
    $stmt->bind_param("i", $promotionId);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Promotion not found.";
        }
    } else {
        echo "Error retrieving promotion information: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$con->close();
?>