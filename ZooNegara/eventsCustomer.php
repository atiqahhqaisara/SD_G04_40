<?php
require 'connection.php'
?>
<!DOCTYPE html>
<html>
<head>
<title>Zoo Negara | Events</title>
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
      <li id="link3"><a href="infoCustomer.php">Visitors Info</a></li>
      <li id="link4" class="selected"><a href="eventsCustomer.php">Events</a></li>
      <li id="link6"><a href="contactCustomer.php">Contact Us</a></li>
      <li id="link7">
        <a href="signOut.php">Sign Out</a>
        </li>  
    </ul>
  </div>
  <div id="content">
    <div id="events">
      <h1>Events</h1>
      <ul>
      <?php
      
      // Check connection
      if (!$con) {
          die("Connection failed: " . mysqli_connect_error());
      }

      // Step 2: Execute a query to retrieve event information
      $sql = "SELECT * FROM event";
      $result = mysqli_query($con, $sql);

      // Step 3: Generate HTML for each event
      while ($row = mysqli_fetch_assoc($result)) {
          echo '<li>';
          echo '<div><a href="#"><img src="' . $row['image'] . '" alt=""/></a></div>';
          echo '<h4><a href="#">' . $row['eventName'] . '</a></h4>';
          echo '<p>Date: ' . $row['eventDate'] . ' - ' . $row['lastDate'].'</p>';
          echo '<p>' . $row['description'] . '</p>';
          echo '</li>';
      }

      // Step 4: Close the database connection
      mysqli_close($con);
      ?>

      </ul>
    </div>
  </div>
  <div id="footer">
    <div> <a href="#" class="logo"><img src="images/capybaraFooter2.png" alt=""/></a>
      <div>
        <p>Zoo Negara, Hulu Kelang, 68000 Ampang, Selangor Darul Ehsan, Malaysia</p>
        <span>For enquiries, please call : </span><span>+603-4108 3422</span><span>Fax : +603-4107 5375</span> <span>Email: @zoonegaramalaysia.com</span> </div>
      <ul class="navigation">
        <li><a href="homepage.php">Home</a></li>
        <li><a href="ticketsCustomer.php">Tickets</a></li>
        <li><a href="zooCustomer.php">The Zoo</a></li>
        <li><a href="eventsCustomer.php">Events</a></li>
        <li><a href="blogCustomer.php">Blog</a></li>
        <li><a href="galleryCustomer.php">Gallery</a></li>
        <li><a href="http://localhost/Dashboard/index.php">Log in Staff and Admin</a></li>
      </ul>
      <ul>
        <li><a href="#">Live : Have fun in your visit</a></li>
        <li><a href="#">Love : Donate for the animals</a></li>
        <li><a href="#">Learn : Get to know the animals</a></li>
      </ul>
      <p><br>Copyright &copy; <a href="#">Zoo Negara 2023</a> - All Rights Reserved | <a target="_blank" href="index.php">zoonegaramalaysia.my</a></p>
    </div>
  </div3
</div>
</body>
</html>
