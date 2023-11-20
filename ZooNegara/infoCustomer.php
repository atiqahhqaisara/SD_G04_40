<?php
require ('connection.php')
?>
<!DOCTYPE html>
<html>
<head>
<style>

        table {
            font-family: arial, sans-serif;
             border-collapse: collapse;
              width: 100%;
        }

        td,th{
             border: 1px solid #dddddd;
            text-align: left;
             padding: 8px;
            }

            th {
      background-color: #f2f2f2;
    }

</style>
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
  <div id="content">
    <div id="info">
      <h1>Visitors Info</h1>
      <p><a href="https://www.zoonegara.my/map.html" id="zooNegara">Zoo Negara Map</a></p>
      <ul>
        <li>
          <h2><a href="#">Getting Here: </a></h2>
          <p>By Light Rail Transit System (LRT) : <br>
            - Alight at Wangsa Maju Station, Kelana Jaya Line  <br>    
            - Board a taxi to Zoo Negara <br></p>
            <p>By Bus : <br><br>
              - Rapid KL number 253 from Putra LRT Station, Wangsamaju, KL<br>    
              - Rapid KL number 220 from Lebuh Ampang, KL</p>
        </li>
        <li>
          <h2><a href="#">Animal Feeding Session</a></h2>
          <a href="#"><img src="images/animalfeed.png" alt="" weight=400 height=220/></a>
          <p>Weekends & Public Holidays<br>
            Children's World : 12.00 pm - 1.00 pm<br>
            Javan Deer : 2.00 pm - 3.00 pm</p>
        </li>
        <li>
          <h2><a href="#">Show Times - Multi-Animal Show</a></h2>
          <a href="#"><img src="images/show_02.jpg" alt="" weight=400 height=220/><br><br></a>
          <p>Saturday - Thursday : 11am & 3pm<br>
            Our Multi-animal Show is CLOSED on Friday EXCEPT school holidays & public holidays.</p>
        </li>

        <h2> Promotion </h2><br>

    <table border="1">
    <tr>
        <th>Promotion Name</th>
        <th>Promotion</th>
        <th>Description</th>
    </tr>
    <?php

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Step 2: Query the database to retrieve information
    $sql = "SELECT * FROM promotion ORDER BY promotionId";
    $promoQry = mysqli_query($con, $sql);

    if (!$promoQry) {
        die("Error executing query: " . mysqli_error($con));
    }

    // Display each promotion's information in a table row
    while ($row = mysqli_fetch_assoc($promoQry)) {
        echo '<tr>';
        echo '<td>' . $row['promotionName'] . '</td>';
        echo '<td>' . $row['promotion'] . '</td>';
        echo '<td>' . $row['description'] . '</td>';
        echo '</tr>';
    }

    // Close the database connection
    mysqli_close($con);
    ?>
    </table>

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
    <div> <a href="#" class="logo"><img src="images/capybaraFooter3.png" alt=""/></a>
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
  </div>
</div>
</body>
</html>
