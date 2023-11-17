<?php
include "controllerUserData.php";
include "connection.php";
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Fetch orders for the current user
$currentCust = $_SESSION['email'];
$sql = "SELECT * FROM booking WHERE email = '$currentCust'";
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
<title>Zoo Negara | The Zoo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<style>
   
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
    }

    a {
      color: #0066cc;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
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
        <h2>Order History</h2>
        <?php
        $sql = "SELECT * FROM booking WHERE status = '1'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            echo "<table border='1'>
                    <tr>
                    <th>Booking ID</th>
                    <th>Booking Date</th>
                    <th>Full Name</th>
                    <th>Receipt</th>
                    </tr>";

            // Output data of each row
            while($row = $result->fetch_assoc()) {
                $bookingId = $row["bookingId"];
                echo "<tr>
                        <td>" . $bookingId . "</td>
                        <td>" . $row["bookingDate"] . "</td>
                        <td>" . $row["fullName"] . "</td>
                        <td><a href='viewReceipt.php?bookingId=$bookingId'>View Receipt</a></td>
                    </tr>";
            }
            

            echo "</table>";
        } else {
            echo "No orders found for the current user";
        }

        // Close connection
        $con->close();
        ?>
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

  
