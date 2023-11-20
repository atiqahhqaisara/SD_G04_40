<!DOCTYPE html>
<html>
<head>
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
        }
        input[type="text"], input[type="date"], input[type="tel"], input[type="email"] {
            width: 40%;
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
          <li id="link7"><a href="signOut.php">Sign Out</a></li>
        </ul>
      </div>

<div id="content" >
<h2>&emsp;&emsp;  Summary Order</h2>

<?php
include 'connection.php';
// Retrieve values from the POST parameters
$bookingDate = isset($_POST['bookingDate']) ? $_POST['bookingDate'] : '';
$MYadult = isset($_POST['MYadult']) ? $_POST['MYadult'] : 0;
$Iadult = isset($_POST['Iadult']) ? (int)$_POST['Iadult'] : 0;
$MYchild = isset($_POST['MYchild']) ? (int)$_POST['MYchild'] : 0;
$Ichild = isset($_POST['Ichild']) ? (int)$_POST['Ichild'] : 0;
$MYsenior = isset($_POST['MYsenior']) ? (int)$_POST['MYsenior'] : 0;
$Isenior = isset($_POST['Isenior']) ? (int)$_POST['Isenior'] : 0;
$fullName = isset($_POST['fullName']) ? $_POST['fullName'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';

// Ticket prices
$priceMYadult = 45.00;
$priceIadult = 50.00;
$priceMYchild = 18.00;
$priceIchild = 25.00;
$priceMYsenior = 23.00;
$priceIsenior = 50.00;

// Calculate total amounts
$totalMYadult = (int)$MYadult * $priceMYadult;
$totalIadult = (int)$Iadult * $priceIadult;
$totalMYchild = (int)$MYchild * $priceMYchild;
$totalIchild = (int)$Ichild * $priceIchild;
$totalMYsenior = (int)$MYsenior * $priceMYsenior;
$totalIsenior = (int)$Isenior * $priceIsenior;

// Calculate overall total
(float)$grandTotal = $totalMYadult + $totalIadult + $totalMYchild + $totalIchild + $totalMYsenior + $totalIsenior;


// Validate numeric values
$MYadult = isset($MYadult) ? floatval($MYadult) : 0;
$Iadult = isset($Iadult) ? floatval($Iadult) : 0;
$MYchild = isset($MYchild) ? floatval($MYchild) : 0;
$Ichild = isset($Ichild) ? floatval($Ichild) : 0;
$MYsenior = isset($MYsenior) ? floatval($MYsenior) : 0;
$Isenior = isset($Isenior) ? floatval($Isenior) : 0;

// SQL query to insert data into the booking table
$sql = "INSERT INTO booking (bookingDate, MYadult, Iadult, MYchild, Ichild, MYsenior, Isenior, fullName, email, phone, grandTotal) 
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $con->prepare($sql);
$stmt->bind_param("ssssssssssd", $bookingDate, $MYadult, $Iadult, $MYchild, $Ichild, $MYsenior, $Isenior, $fullName, $email, $phone, $grandTotal);

if ($stmt->execute()) {
    $lastInsertId = $stmt->insert_id; // Retrieve the auto-generated bookingId
    echo "&emsp;&emsp;&emsp;&emsp;Booking information inserted successfully. Booking ID: " . $lastInsertId;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$con->close();

?>

<form action="processPayment.php" method="post">
    <p>&emsp;&emsp;&emsp;&emsp;Date: <?= $bookingDate ?></p>
    <p>&emsp;&emsp;&emsp;&emsp;Full Name: <?= $fullName ?></p>
    <p>&emsp;&emsp;&emsp;&emsp;Email: <?= $email ?></p>
    <p>&emsp;&emsp;&emsp;&emsp;Phone: <?= $phone ?></p>

    <h3>&emsp;&emsp;&emsp;  Tickets:</h3>
    <ul>
        &emsp;&emsp;&emsp;&emsp;<li>Malaysian Adult (RM<?= $priceMYadult ?>): <?= $MYadult ?> x RM<?= $totalMYadult ?></li>
        <li>Foreigner Adult (RM<?= $priceIadult ?>): <?= $Iadult ?> x RM<?= $totalIadult ?></li>
        <li>Malaysian Child (RM<?= $priceMYchild ?>): <?= $MYchild ?> x RM<?= $totalMYchild ?></li>
        <li>Foreigner Child (RM<?= $priceIchild ?>): <?= $Ichild ?> x RM<?= $totalIchild ?></li>
        <li>Malaysian Senior (RM<?= $priceMYsenior ?>): <?= $MYsenior ?> x RM<?= $totalMYsenior ?></li>
        <li>Foreigner Senior (RM<?= $priceIsenior ?>): <?= $Isenior ?> x RM<?= $totalIsenior ?></li>
    </ul>

    <p>&emsp;&emsp;&emsp;&emsp;Grand Total: RM<?= $grandTotal ?></p>

    <input type="hidden" name="bookingDate" value="<?= $bookingDate ?>">
    <input type="hidden" name="fullName" value="<?= $fullName ?>">
    <input type="hidden" name="email" value="<?= $email ?>">
    <input type="hidden" name="phone" value="<?= $phone ?>">
    <input type="hidden" name="MYadult" value="<?= $MYadult ?>">
    <input type="hidden" name="Iadult" value="<?= $Iadult ?>">
    <input type="hidden" name="MYchild" value="<?= $MYchild ?>">
    <input type="hidden" name="Ichild" value="<?= $Ichild ?>">
    <input type="hidden" name="MYsenior" value="<?= $MYsenior ?>">
    <input type="hidden" name="Isenior" value="<?= $Isenior ?>">
    <input type="hidden" name="grandTotal" value="<?= floatval($grandTotal) ?>">

    <div id="header">
    <br>
    <button>Pay Now</button>
</div>

</form>




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
        <li><a href="tickets.php">Tickets</a></li>
        <li><a href="zoo.php">The Zoo</a></li>
        <li><a href="events.php">Events</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="gallery.php">Gallery</a></li>
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
