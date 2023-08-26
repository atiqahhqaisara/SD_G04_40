
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Animal Kingdom Zoo | Gallery</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="css/style.css" type="text/css" />

  <!-- Font Icon -->
  <link rel="stylesheet" href="RegisterSignIn/fonts/material-icon/css/material-design-iconic-font.min.css">

  <!-- Main css -->
  <link rel="stylesheet" href="RegisterSignIn/css/style.css">

</head>
<body>
<div id="page">
<ul id="navigation">
  <div id="header"> <a href="index.html" id="logo"><img src="images/header_logo_Zoo_Negara.png" alt="headerLogo" height = 230/></a>
    
  </div>

<div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Full Name" required/>
                            </div>

                            <div class="form-group">
                                <label for="dob"><i class="zmdi zmdi-calendar"></i></label>
                                <input type="date" name="dob" id="dob" placeholder="Your Date Of Birth" required/>
                            </div>

                            <div class="form-group">
                                <label for="contactNumber"><i class="zmdi zmdi-smartphone"></i></label>
                                <input type="number" name="contactNumber" id="contactNumber" placeholder="Your Phone Number" required/>
                            </div>

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>

                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="RegisterSignIn/images/signup-image.png" alt="sing up image"></figure>
                        <a href="registerSignIn.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
  </div>
   
</ul>
  </div>
  
  <div id="footer">
    <div> <a href="#" class="logo"><img src="images/animal-kingdom.jpg" alt=""/></a>
      <div>
        <p>Ellentesque habitant morbi tristique senectus et 0000</p>
        <span>285 067-39 282 / 5282 9273 999</span> <span>email@animalkingdomzoo.com</span> </div>
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
      <p>Copyright &copy; <a href="#">Domain Name</a> - All Rights Reserved | Template By <a target="_blank" href="http://www.freewebsitetemplates.com/">FreeWebsiteTemplates.com</a></p>
    </div>
  </div>
</div>
</body>
</html>

<?php
include "connection.php";

if (!$con) {
    echo "Error: " . mysqli_connect_error($con);
} else {
    session_start();

    if (isset($_POST['signup'])) {
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $contactNumber = $_POST['contactNumber'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $re_pass = $_POST['re_pass'];

        if ($_POST['pass'] != $_POST['re_pass']) {
            echo "Your passwords did not match.";
        } 
        else {
            $sql = "insert into customer(name, dob, contactNumber, email, pass, re_pass)
                    VALUES('$name','$dob','$contactNumber','$email','$pass','$re_pass')";
                    
            $result = mysqli_query($con, $sql);
            header("location:registerSignIn.php");
            exit();
        }
    }
}
?>



