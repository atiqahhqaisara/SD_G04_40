<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Receipt</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .receipt-card {
            width: 400px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .receipt-details {
            margin-bottom: 20px;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="receipt-card w3-container">

        <h2 class="w3-text-blue">Receipt Details</h2>

        <?php
        // Retrieve the booking ID from the URL parameter
        $bookingId = $_GET['bookingId'];

        // Fetch details from the database based on the booking ID
        include "connection.php";
        $sql = "SELECT * FROM booking WHERE bookingId = '$bookingId'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Display receipt details here
            echo "<div class='receipt-details'>
                    <p><strong>Booking ID:</strong> " . $row["bookingId"] . "</p>
                    <p><strong>Booking Date:</strong> " . $row["bookingDate"] . "</p>
                    <p><strong>Email:</strong> " . $row["email"] . "</p>
                    <p><strong>Phone Number:</strong> " . $row["phone"] . "</p>
                    <p><strong>Malaysian Adult:</strong> " . $row["MYadult"] . "</p>
                    <p><strong>Malaysian Child:</strong> " . $row["MYchild"] . "</p>
                    <p><strong>Malaysian Senior:</strong> " . $row["MYsenior"] . "</p>
                    <p><strong>International Adult:</strong> " . $row["Iadult"] . "</p>
                    <p><strong>International Child:</strong> " . $row["Ichild"] . "</p>
                    <p><strong>International Senior:</strong> " . $row["Isenior"] . "</p>
                    <p><strong>Total:</strong> " . "RM ".$row["grandTotal"] . "</p>
                  </div>";

        } else {
            echo "<p class='w3-text-red'>Receipt not found.</p>";
        }

        // Close connection
        $con->close();
        ?>

        <!-- Add other receipt details or formatting as needed -->

        <a href="history.php" class="w3-button w3-blue back-link">Back to Order History</a>
    </div>
    
</body>
</html>
