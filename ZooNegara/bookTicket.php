<?php
include "controllerUserData.php";

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

$currentCust = $_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Zoo Negara | Book Ticket</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="css/style.css" type="text/css" />

    <title>Zoo Negara | Book Ticket</title>
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
            line-height: 3.5
        }
        input[type="text"], input[type="date"], input[type="tel"], input[type="email"], input[type="number"] {
            width: 37%;
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
            <h2>Booking Form</h2>
            <form action="summaryOrder.php" method="post">
            <label for="booking">Select Date:</label>
            <input type="date" id="booking" name="bookingDate" required><br><br>

                <label for="ticket">Select Ticket:</label>
                <label for="visitors">Malaysian (MyKad) &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Foreigner (i-KAD)</label>

                <br><a>Adult - RM45.00&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Adult - RM50.00 </a><br>
                <input type="number" id="MYadult" name="MYadult" min="1" max="10">
                &ensp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <input type="number" id="Iadult" name="Iadult" min="1" max="10"><br>

                <br><a>Children (3 to 12 years old) - RM18.00 &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Children (3 to 12 years old) - RM25.00 </a><br>
                <input type="number" id="MYchild" name="MYchild" min="1" max="10">
                &ensp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <input type="number" id="Ichild" name="Ichild" min="1" max="10"><br>

                <br><a>Senior Citizen (60 years and above) - RM23.00&ensp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Senior Citizen (60 years and above) - RM50.00 </a><br>
                <input type="number" id="MYsenior" name="MYsenior" min="1" max="10">
                &ensp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <input type="number" id="Isenior" name="Isenior" min="1" max="10"><br><br>

                <!-- New division for user details -->
                    <h2>User Details</h2>
                    <label for="fullName">Full Name:</label>
                    <input type="text" id="fullName" name="fullName" required><br><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $currentCust; ?>" required><br><br>

                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required><br><br>

                    <div id="header">
                        <br>
                        <button type="submit">Next</button>
                    </div>
            </form>
        </div>
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