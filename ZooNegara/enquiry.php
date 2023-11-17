<?php
include "controllerUserData.php";

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

$currentCust = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Insert the enquiry into the database
    $sql = "INSERT INTO `enquiry` (`email`, `phone`, `message`, `time`) 
            VALUES ('$email', '$phone', '$message', current_timestamp())";

    if (mysqli_query($con, $sql)) {
        echo '<script>alert("Thanks for your enquiry. We will contact you very soon.");
                    window.location.href="http://localhost/ZooNegara/homepage.php";  
                    </script>';
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Zoo Negara | Info</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
<div id="page">
  <div id="header"> <a href="homepage.php" id="logo"><img src="images/header_logo_Zoo_Negara.png" alt="headerLogo" height = 230/></a>
    <ul id="links">
      <li class="first">
        <h2><a href="live.php">Live</a></h2>
        <span>Have fun in your visit</span> </li>
      <li>
        <h2><a href="#">Love</a></h2>
        <span>Donate for the animals</span> </li>
      <li>
        <h2><a href="#">Learn</a></h2>
        <span>Get to know the animals</span> </li>
    </ul>
    <ul id="navigation">
      <li id="link1"><a href="customerProfile.php">Profile</a></li>
      <li id="link1"><a href="homepage.php">Home</a></li>
      <li id="link2"><a href="zooCustomer.php">The Zoo</a></li>
      <li id="link3" class="selected"><a href="infoCustomer.php">Visitors Info</a></li>
      <li id="link4"><a href="eventsCustomer.php">Events</a></li>
      <li id="link6"><a href="contactCustomer.php">Contact Us</a></li>
      <li id="link7">
        <a href="signOut.php">Sign Out</a>
        </li>
    
    </ul>
  </div>

<body>
    <div id="content">
        <!-- ... (Your existing HTML code) ... -->

        <!-- Enquiry Form Section -->
        <div class="section3">
            <h2>Contact Us</h2>
            <form action="enquiry.php" method="POST">
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $currentCust; ?>" required readonly>
                </div>
                <div>
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Your phone number" required pattern="[0-9]{10}">
                </div>
                <div>
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" placeholder="How may we help you?" required></textarea>
                </div>
                <div>
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
