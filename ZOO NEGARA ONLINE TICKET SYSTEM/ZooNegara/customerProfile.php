<?php
require 'controllerUserData.php'
?>
<!DOCTYPE html>
<html>
<head>
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
            width: 230%;
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
          <li id="link1"  class="selected"><a href="customerProfile.php">Profile</a></li>
          <li id="link1"><a href="homepage.php">Home</a></li>
          <li id="link2"><a href="history.php">History</a></li>
          <li id="link3"><a href="promotionCustomer.php">Promotion</a></li>
          <li id="link4"><a href="eventsCustomer.php">Events</a></li>
          <li id="link3"><a href="contactCustomer.php">Contact Us</a></li>
          <li id="link7"><a href="signOut.php">Sign Out</a></li>
        </ul>
      </div>

<div id="content">
    <div id="profile">
    <?php
      if(isset($_POST['UpdateCust'])){
        $name=$_POST['name'];
        $dob=$_POST['dob'];
        $contactNumber=$_POST['contactNumber'];
        $email=$_POST['email'];

        $sql="UPDATE customer SET
        name='$name',
        dob='$dob',
        contactNumber='$contactNumber',
        email='$email' 
        WHERE email='$email'";

        if ($con->query($sql) === TRUE) {
          echo "Record updated successfully";
        } else {
          echo "Error updating record: " . $con->error;
        }
      }
      $currentCust = $_SESSION['email'];
      $sql = "SELECT * FROM customer WHERE email='$currentCust'";
      $result = $con->query($sql);
      if ($result) {
          if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_array($result)) {
                  ?>
      <form action="" method="POST">
        <h1>Your Profile</h1>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>">

                    <br><br><label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" value="<?php echo $row['dob']; ?>">

                    <br><br><label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="contactNumber" value="<?php echo $row['contactNumber']; ?>">

                    <br><br><label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>">
                
                    <br><br><button type="submit" name="UpdateCust">Edit Profile</button><br><br>

                    <button type="button" onclick="window.location.href='changePassword.php';">Change Password</button>

                   
      </form>
      <?php
              }
            }
          }
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
        <li><a href="eventsCustomer.php">Events</a></li>
        <li><a href="zooCustomer.php">The Zoo</a></li>
        <li><a href="infoCustomer.php">Visitor Info</a></li>
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
