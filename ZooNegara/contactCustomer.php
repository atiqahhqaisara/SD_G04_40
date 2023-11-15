<?php
require 'connection.php'
?>
<!DOCTYPE html>
<html>
<head>
<title>Zoo Negara | Contact</title>
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
            width: 160%;
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
      <li id="link7" class="selected"><a href="contactCustomer.php">Contact Us</a></li>
      <li id="link7">
        <a href="signOut.php">Sign Out</a>
        </li>  
    </ul>
  </div>
  <div id="content">
    <div id="contact">
      <h1>Contact Information</h1>
      <ul>
       <h4>For any enquiries, call our general lines +603-4108 3422 / +603-4108 3424 and ask for the following Department:</h4>
      <h4><br>Location :</h4>
      <p>Zoo Negara, Hulu Kelang, 68000 Ampang, Selangor Darul Ehsan, Malaysia.</p>
      <h4>Operating Hours :</h4>
      <p>Open Daily: 9:30 AM - 5:00 PM</p> 

      <h4>Person in Charge :</h4>

      <?php
      
      // Check connection
      if (!$con) {
          die("Connection failed: " . mysqli_connect_error());
      }

      // Step 2: Execute a query to retrieve event information
      $sql = "SELECT * FROM contact";
      $result = mysqli_query($con, $sql);

      // Step 3: Generate HTML for each event
      while ($row = mysqli_fetch_assoc($result)) {
         
          echo '<p>'.$row['picName'].' - ' .$row['picNum'].' ('.$row['picEmail'].')</p>';
         
      }

      // Step 4: Close the database connection
      mysqli_close($con);
      ?>   
      
      <a href="https://www.facebook.com/znegaramalaysia" id="facebook">Facebook</a> <a href="https://twitter.com/znmzoonegara" id="twitter">Twitter</a><br> 
      <form  action="insertenquiry.php" method="post">
      <h3>Do leave us an</h3><br>
        <h2>ENQUIRY</h2><br>
        <textarea name="enquiry" rows="6" cols="80" required></textarea>
        <br><br><br><button type="submit" name="submit">Submit</button><br><br><br>
        </form>
      </ul>


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
