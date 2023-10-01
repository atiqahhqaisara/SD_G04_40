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
   <h1 style = "text-align: center"> Summary Order </h1>
   <h2> &emsp; Selected Date: </h2>
   &emsp;&emsp;<input type="date" id="selectedDate" name="selectedDate" required>
   <br>
   <br>

   <!-- info ticket here --> 
   <h2> &emsp; Ticket Info  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Quantity </h2>
   &emsp;&emsp;<input type="text" id="selectedTicket" name="selectedTicket" required>
   &emsp;&emsp;&emsp;<input type="text" id="selectedTicket" name="selectedTicket" required>
   <br>
   <br>


   <hr>
   
   <h2> &emsp; Total:</h2>
   &emsp;&emsp;<input type="text" id="selectedTicket" name="selectedTicket" required>
   <br> <br>
   <hr>
   <br>

   &emsp; &emsp; <a>Name: </a>
   <br>
   &emsp; &emsp; <a>Email: </a>
   <br>
   &emsp; &emsp; <a>Phone Number: </a>
   <br>

    <div id="header"> 
        <br>
        <a>Pay Now</a>
       
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
                <li> <a href="#"><img src="images/deer.png" alt=""/></a> <a href="#">Spotted Deer</a> </li>
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