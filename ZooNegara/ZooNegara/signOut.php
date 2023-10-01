
<?php
session_start();
if(isset($_POST['signout'])){

if(session_destroy())
{
header("Location:index.html");
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Zoo Negara | Sign Out</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<style>
    h1 {text-align: center;}
</style>

<body>
<div id="page">
    <div id="header"> <a href="index.html" id="logo"><img src="images/header_logo_Zoo_Negara.png" alt="headerLogo" height = 230/></a>
        <ul id="links">
          <li class="first">
            <h2><a href="live.html">Live</a></h2>
            <span>Have fun in your visit</span> </li>
          <li>
            <h2><a href="#">Love</a></h2>
            <span>Donate for the animals</span> </li>
          <li>
            <h2><a href="#">Learn</a></h2>
            <span>Get to know the animals</span> </li>
        </ul>
        <a href="buyTicketSignUp.php">Buy tickets / Sign Up</a>
        <ul id="navigation">
          <li id="link1"><a href="index.html">Home</a></li>
          <li id="link2"><a href="zoo.html">The Zoo</a></li>
          <li id="link3"><a href="info.html">Visitors Info</a></li>
          <li id="link4"><a href="events.html">Events</a></li>
          <li id="link5"><a href="gallery.html">Gallery</a></li>
          <li id="link6"><a href="contact.html">Contact Us</a></li>
       
        </ul>
      </div>

  <div id="content">
    <div id="gallery">
      <h1>You Already Sign Out.</h1>
      <h1>Thank you for using Zoo Negara's Website.</h1>
      <h1>Welcome you back again.<br></h1>
      <div class="featured">
        <h2>Meet our Cutie Animals</h2>
        <ul>
          <li class="first"> <a href="#"><img src="images/lion.png" alt=""/></a> <a href="#">Lion</a> </li>
          <li> <a href="#"><img src="images/elephant.png" alt=""/></a> <a href="#">Elephant</a> </li>
          <li> <a href="#"><img src="images/panda.png" alt=""/></a> <a href="#">Panda</a> </li>
          <li> <a href="#"><img src="images/capybara.png" alt=""/></a> <a href="#">Capybara</a> </li>
          <li> <a href="#"><img src="images/zif.png" alt=""/></a> <a href="#">Giraffe</a> </li>
        </ul>
      </div>
    </div>
    
  </div>
  
  
  <div id="footer">
    <div> <a href="#" class="logo"><img src="images/capybaraFooter.png" alt=""/></a>
      <div>
        <p>Zoo Negara, Hulu Kelang, 68000 Ampang, Selangor Darul Ehsan, Malaysia</p>
        <span>For enquiries, please call : </span><span>+603-4108 3422</span><span>Fax : +603-4107 5375</span> <span>Email: @zoonegaramalaysia.com</span> </div>
      <ul class="navigation">
        <li><a href="index.html">Home</a></li>
        <li><a href="tickets.html">Tickets</a></li>
        <li><a href="zoo.html">The Zoo</a></li>
        <li><a href="events.html">Events</a></li>
        <li><a href="blog.html">Blog</a></li>
        <li><a href="gallery.html">Gallery</a></li>
      </ul>
      <ul>
        <li><a href="#">Live : Have fun in your visit</a></li>
        <li><a href="#">Love : Donate for the animals</a></li>
        <li><a href="#">Learn : Get to know the animals</a></li>
      </ul>
      <p><br>Copyright &copy; <a href="#">Zoo Negara 2023</a> - All Rights Reserved | <a target="_blank" href="index.html">zoonegaramalaysia.my</a></p>
    </div>
  </div>
</div>
</body>
</html>
