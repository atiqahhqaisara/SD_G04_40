<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zoo Negara | Register</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <!-- Font Icon -->
    <link rel="stylesheet" href="RegisterSignIn/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="RegisterSignIn/css/style.css">

    <style>
        button {
            background-color: #964B00;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            font-family: "Times New Roman", Times, serif;
        }

        button:hover {
            background-color: #CC9966;
        }

        #password-display {
            font-size: 14px;
            margin-top: 5px;
            color: #333;
        }

        .password-valid {
            color: green;
        }

        .password-invalid {
            color: red;
        }

        
    </style>
</head>

<body>
    <div id="page">
        <ul id="navigation">
            <div id="header">
                <a href="index.php" id="logo"><img src="images/header_logo_Zoo_Negara.png" alt="headerLogo" height="230"/></a>
    </div>

            <div class="main">
                <!-- Sign up form -->
                <section class="signup">
                    <div class="container">
                        <div class="signup-content">
                            <div class="signup-form">
                                <h2 class="form-title">Sign up</h2>
                                <form method="POST" class="register-form" id="register-form">
                                    <?php
                                    if(count($errors) == 1) {
                                        ?>
                                        <div class="alert alert-danger text-center">
                                            <?php
                                            foreach($errors as $showerror) {
                                                echo $showerror;
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    } elseif(count($errors) > 1) {
                                        ?>
                                        <div class="alert alert-danger">
                                            <?php
                                            foreach($errors as $showerror) {
                                                ?>
                                                <li><?php echo $showerror; ?></li>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                            <p>Your Full Name:</p>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="" required/>
                            </div>
                            <p>Your Date Of Birth:</p>
                            <div class="form-group">
                                <label for="dob"><i class="zmdi zmdi-calendar"></i></label>
                                <input type="date" name="dob" id="dob" placeholder="" required/>
                            </div>

                            <p>Your Phone Number:</p>
                            <div class="form-group">
                                <label for="contactNumber"><i class="zmdi zmdi-smartphone"></i></label>
                                <input type="number" name="contactNumber" id="contactNumber" placeholder="" required/>
                            </div>

                            <p>Your Email:</p>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="" required/>
                            </div>

                            <p>Your Password:</p>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="*Length must be between 8 and 20 characters" 
                                minlength="8" maxlength="20" oninput="checkPassword()" required />
                            </div>



                            <p>Repeat your password:</p>
                            <div class="form-group">
                                <label for="cpassword"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="cpassword" id="cpassword" placeholder="" minlength="8" maxlength="20" 
                                oninput="checkPassword()" />
                            </div>

                             <div id="password-display"></div>
                            </div>
                            
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                               <!-- <a href="registerSignin.php"><button class="" role="button">Register</button></a> -->
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
        <li id="link1"><a href="registerSignIn.php">Profile</a></li>
        <li><a href="index.php">Home</a></li>
        <li><a href="tickets.php">Tickets</a></li>
        <li><a href="zoo.php">The Zoo</a></li>
        <li><a href="events.php">Events</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="gallery.php">Gallery</a></li>
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
<script>
        function checkPassword() {
            var passwordInput = document.getElementById("password");
            var confirmPasswordInput = document.getElementById("cpassword");
            var passwordDisplay = document.getElementById("password-display");

            if (passwordInput.value.length >= 8 && passwordInput.value.length <= 20) {
                passwordDisplay.textContent = "Password meets the length requirement";
                passwordDisplay.className = "password-valid";
            } else {
                passwordDisplay.textContent = "Password must be between 8 and 20 characters";
                passwordDisplay.className = "password-invalid";
            }

            if (confirmPasswordInput.value !== "" && passwordInput.value !== confirmPasswordInput.value) {
                passwordDisplay.textContent = "Passwords do not match";
                passwordDisplay.className = "password-invalid";
            }
        }
    </script>
</body>
</html>





