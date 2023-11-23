<?php
require 'connection.php'
?>

<!DOCTYPE html>
<html>

<head>
<title>Zoo Negara | The Zoo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="css/style.css" type="text/css" />

<style>
        img {
            margin-bottom: 12px; 
        }
    </style>
</head>
<body>
<div id="page">
  <div id="header"> <a href="homepage.php" id="logo">
  <img src="images/header_logo_Zoo_Negara.png" alt="headerLogo" height = 230/></a>
    <ul id="links">
      <li class="first">
        <h2><a>Live</a></h2>
        <span>Have fun in your visit</span> </li>
      <li>
        <h2><a>Love</a></h2>
        <span>Donate for the animals</span> </li>
      <li>
        <h2><a>Learn</a></h2>
        <span>Get to know the animals</span> </li>
    </ul>
    <ul id="navigation">
      <li id="link1"><a href="customerProfile.php">Profile</a></li>
      <li id="link1"><a href="homepage.php">Home</a></li>
      <li id="link2" class="selected"><a href="zooCustomer.php">The Zoo</a></li>
      <li id="link3"><a href="infoCustomer.php">Visitors Info</a></li>
      <li id="link4"><a href="eventsCustomer.php">Events</a></li>
      <li id="link6"><a href="contactCustomer.php">Contact Us</a></li>
      <li id="link7">
        <a href="signOut.php">Sign Out</a>
        </li>
    </ul>
  </div>
  <div id="content">
    <div id="zoo">
      <h1>About Us</h1><br>
      <img src="images/bannerZoo.png" alt="" width="870" height="200">
      <br>
        <h2>Vision</h2>
        <?php
            if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
            }

            // Step 2: Query the database to retrieve information
            $sql = "SELECT * FROM aboutvision ORDER BY visionid";
            $visionQry = mysqli_query($con, $sql);

            if (!$visionQry) {
            die("Error executing vision query: " . mysqli_error($con));
            }

            // Display each vision's information
            while ($row = mysqli_fetch_assoc($visionQry)) {
            echo '<p>' . $row['vision'] . '</p>';
            echo '<br>';
            }

            // Close the vision query
            mysqli_free_result($visionQry);

            // Close the database connection
            mysqli_close($con);
            ?>

        <h2>Mission</h2>

        <!-- Re-establish the connection before querying "Person in Charge" information -->
        <?php
            require 'connection.php';

            // Check connection
            if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
            }

            // Step 2: Execute a query to retrieve "Person in Charge" information
            $sql = "SELECT * FROM aboutmission";
            $result = mysqli_query($con, $sql);

            if (!$result) {
             die("Error executing person in charge query: " . mysqli_error($con));
            }   

            // Display each "Person in Charge" information
            while ($row = mysqli_fetch_assoc($result)) {
            echo '<p>' . $row['mission'] . '</p>';
            }
    
           // Close the "Person in Charge" query
            mysqli_free_result($result);

            // Close the database connection
            mysqli_close($con);
        ?>

      <h2>Logo of Zoo Negara</h2><br>
      <img src="images/sangkancil.png" alt=""/></a>
      <h4>The Malaysian Zoological Society has adopted the drawing of a mouse deer or “Sang Kancil” as the Society’s emblem.</h4>
      <h4>Sang Kancil is a clever, tricky mouse deer who is always finding himself in predicaments with animals that want to eat him or harm him, but he cleverly manages to escape each time.</h4>
    
    </div>
    <div class="featured">
      <h2>Meet our Cutie Animals</h2>
      <ul>
        <li class="first"> <a href="#"><img src="images/lion.png" alt=""/></a> <a href="#">Lion</a> </li>
        <li> <a href="#"><img src="images/elephant.png" alt=""/></a> <a href="#">Elephant</a> </li>
        <li> <a href="#"><img src="images/panda.png" alt=""/></a> <a href="#">Panda</a> </li>
        <li> <a href="#"><img src="images/capybara.png" alt=""/></a> <a href="#">Capybara</a> </li>
        <li> <a href="#"><img src="images/zif.png" alt=""/></a> <a href="#">Giraffe</a> </li>
        <li> <a href="#"><img src="images/gibbon.png" alt=""/></a> <a href="#">White Gibbon</a> </li>
        <li> <a href="#"><img src="images/serval.png" alt=""/></a> <a href="#">Serval Cat</a> </li>        
      </ul>
    </div>
    
  </div>
  <div id="footer">
    <div> <a href="#" class="logo"><img src="images/capybaraFooter.png" alt=""/></a>
      <div>
        <p>Zoo Negara, Hulu Kelang, 68000 Ampang, Selangor Darul Ehsan, Malaysia</p>
        <span>For enquiries, please call : </span><span>+603-4108 3422</span><span>Fax : +603-4107 5375</span> <span>Email: @zoonegaramalaysia.com</span> </div>
      <ul class="navigation">
        <li><a href="index.php">Home</a></li>
        <li><a href="zoo.php">The Zoo</a></li>
        <li><a href="events.php">Events</a></li>
        <li><a href="../Dashboard/index.php">Log in Staff and Admin</a></li>
      </ul>
      <ul>
        <li><a>Live : Have fun in your visit</a></li>
        <li><a>Love : Donate for the animals</a></li>
        <li><a>Learn : Get to know the animals</a></li>
      </ul>
      <p><br>Copyright &copy; <a href="#">Zoo Negara 2023</a> - All Rights Reserved | <a target="_blank" href="index.php">zoonegaramalaysia.my</a></p>
    </div>
  </div>
</div>
</body>
</html>
