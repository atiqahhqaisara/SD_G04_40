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
        input[type="password"], input[type="date"], input[type="tel"], input[type="email"] {
            width: 300%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .button {
            background-color: #964B00;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .button:hover {
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
          <li id="link1" class="selected"><a href="customerProfile.php">Profile</a></li>
          <li id="link1"><a href="homepage.php">Home</a></li>
          <li id="link2"><a href="zooCustomer.php">The Zoo</a></li>
          <li id="link3"><a href="infoCustomer.php">Visitors Info</a></li>
          <li id="link4"><a href="eventsCustomer.php">Events</a></li>
          <li id="link6"><a href="contactCustomer.php">Contact Us</a></li>
          <li id="link7"><a href="signOut.php">Sign Out</a></li>
        </ul>
      </div>

    <div id="content">
      <form method="post" action="">
        <div id="changePassword">
        <?php
        if (isset($_SESSION['email'])) {
            $currentUser = $_SESSION['email'];

            if (isset($_POST['updatePassword'])) {
                // Include your database connection file
                include('connection.php');

                $old_pass = trim($_POST['oldPass']); // Trim whitespace from the input
                $new_pass = $_POST['newPass'];
                $re_pass = $_POST['rePass'];

                // Check the connection
                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                }

                // Use prepared statements to prevent SQL injection
                $stmt = $con->prepare("SELECT * FROM customer WHERE email = ?");
                $stmt->bind_param("s", $currentUser);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows === 1) {
                    $row = $result->fetch_assoc();
                    $stored_hashed_pwd = $row['password']; // Stored hashed password

                    // Verify the old password using password_verify
                    if (password_verify($old_pass, $stored_hashed_pwd)) {
                        if ($new_pass === $re_pass) {
                            // Hash the new password using password_hash
                            $hashed_new_pass = password_hash($new_pass, PASSWORD_BCRYPT);

                            // Use prepared statement to update the hashed password
                            $update_stmt = $con->prepare("UPDATE customer SET password = ? WHERE email = ?");
                            $update_stmt->bind_param("ss", $hashed_new_pass, $currentUser);
                            $update_stmt->execute();
                            $update_stmt->close();

                            echo "<script>alert('Update Successfully'); window.location='changePassword.php'</script>";
                        } else {
                            echo "<script>alert('Your new and Retype Password do not match'); window.location='changePassword.php'</script>";
                        }
                    } else {
                        echo "<script>alert('Your old password is incorrect'); window.location='changePassword.php'</script>";
                    }
                } else {
                    // Handle the case when the user doesn't exist
                    echo "<script>alert('User with email $currentUser not found'); window.location='changePassword.php'</script>";
                }

                // Close the database connection
                $con->close();
            }
        } else {
            echo "<script>alert('Session not found. Please log in.'); window.location='registerSignIn.php'</script>";
        }
        ?>

          <label for="name">Old Password:</label>
            <input type="password" name="oldPass" required>
          <br><br>

          <label for="name">New Password:</label>
            <input type="password" name="newPass" required>
          <br><br>

          <label for="name">Re-Enter New Password:</label>
            <input type="password" name="rePass" required>
          <br><br>

          </div>

            <div id="header"> 
            <input type="submit" class="button" name="updatePassword" value="Change Password"><br><br>
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
