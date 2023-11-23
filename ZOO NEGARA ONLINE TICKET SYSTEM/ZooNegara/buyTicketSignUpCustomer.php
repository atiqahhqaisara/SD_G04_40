<?php
require 'connection.php'
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Zoo Negara | Ticket Price and Operation Hours</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="css/style.css" type="text/css" />

    <title>Zoo Negara | Profile</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="css/style.css" type="text/css" />

<style>
  body{
    font-family: Arial;
    color: #875316;
    font-size: 15px;
    font-weight: normal;
    }
        .container {
            max-width: 400px;
            margin: 0 auto;
             
        }

        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"], input[type="date"], input[type="tel"], input[type="email"] {
            width: 300%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #964B00;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #CC9966;
        }

        table {
            font-family: arial, sans-serif;
             border-collapse: collapse;
              width: 100%;
        }

        td, th {
             border: 1px solid #dddddd;
            text-align: left;
             padding: 8px;
            }

</style>
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
      <li id="link4"><a href="eventsCustomer.php">Events</a></li>
      <li id="link6"><a href="contactCustomer.php">Contact Us</a></li>
      <li id="link7">
      <a href="signOut.php">Sign Out</a>
      </li>
    </ul>
  </div>
  <div id="content">

  <div id="tickets">
      <h1 style="text-align:center"><br>Ticket Price and Operation Hours</h1>
         <table>
         <?php

          if (!$con) {
              die("Connection failed: " . mysqli_connect_error());
          }

$sql = "SELECT * FROM ticket ORDER BY ticketId";
$custQry = mysqli_query($con, $sql);

if (!$custQry) {
    die("Error executing query: " . mysqli_error($con));
}


echo '<table class="w3-table w3-striped">';
echo '<tr>';
echo '<th>Ticket ID</th>';
echo '<th>Visitor</th>';
echo '<th>Category</th>';
echo '<th>Price</th>';
echo '</tr>';

// Display each customer's information
$count = 1;
while ($row = mysqli_fetch_assoc($custQry)) {
    echo '<tr>';
    echo '<td>' . $row['ticketId'] . '</td>';
    echo '<td>' . $row['visitor'] . '</td>';
    echo '<td>' . $row['category'] . '</td>';
    echo '<td>' . 'RM ' . $row['price'] . '</td>';
    echo '</tr>';
    $count++;
}

echo '</table>';

// Close the database connection
mysqli_close($con);
?>



<div id ="header"> 
<br><br>
        
       <a style="margin:auto; text-align:center;" href= "bookTicket.php">Book Here</a>
       
      </div>


      
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