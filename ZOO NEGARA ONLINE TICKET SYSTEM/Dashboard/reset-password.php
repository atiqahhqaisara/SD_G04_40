<?php
$error = "";
?>
<html>
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Reset Password</title>
    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png" />
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
        crossorigin="anonymous"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());
        gtag("config", "G-GBZ3SGGX85");
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
    </script>
    <!-- End Google Tag Manager -->
</head>
<body>
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="/Dashboard/index.php">
                    <img src="vendors/images/deskapp-logo.svg" alt="" />
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="/Dashboard/index.php">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="vendors/images/forgot-password.png" alt="" />
                </div>
                <div class="col-md-6">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Reset Password</h2>
                        </div>
                        <h6 class="mb-20">Enter your new password, confirm and submit</h6>
                        <!-- Reset Password Form -->
                        <?php
                        include('connection.php');
                        if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
                            $key = $_GET["key"];
                            $email = $_GET["email"];
                            $curDate = date("Y-m-d H:i:s");
                            $query = mysqli_query($con, "SELECT * FROM `password_reset_temp` WHERE `key`='$key' and `email`='$email'");
                            $row = mysqli_num_rows($query);
                            if ($row == 0) {
                                $error .= '<h2>Invalid Link</h2>';
                            } else {
                                $row = mysqli_fetch_assoc($query);
                                $expDate = $row['expDate'];
                                if ($expDate >= $curDate) {
                                    ?>
                                    <form method="post" action="" name="update">
                                        <input type="hidden" name="action" value="update" class="form-control" />
                                        <div class="form-group">
                                            <label><strong>Enter New Password:</strong></label>
                                            <input type="password" name="pass1" class="form-control" minlength="8" maxlength="20"
                                                required />
                                            <!-- Adjust the minlength and maxlength values as needed -->
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Re-Enter New Password:</strong></label>
                                            <input type="password" name="pass2" class="form-control" minlength="8" maxlength="20"
                                                required />
                                            <!-- Adjust the minlength and maxlength values as needed -->
                                        </div>
                                        <input type="hidden" name="email" value="<?php echo $email; ?>" />
                                        <div class="form-group">
                                            <input type="submit" id="reset" value="Reset Password" class="btn btn-primary" />
                                        </div>
                                    </form>
                                    <?php
                                } else {
                                    $error .= "<h2>Link Expired</h2>";
                                }
                            }
                            if ($error != "") {
                                echo "<div class='error'>" . $error . "</div><br />";
                            }
                        }
                        if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
                            $error = "";
                            $pass1 = mysqli_real_escape_string($con, $_POST["pass1"]);
                            $pass2 = mysqli_real_escape_string($con, $_POST["pass2"]);
                            $email = $_POST["email"];
                            $curDate = date("Y-m-d H:i:s");
                            if ($pass1 != $pass2) {
                                $error .= "<p>Passwords do not match, both passwords should be the same.<br /><br /></p>";
                            }
                            if ($error != "") {
                                echo $error;
                            } else {
                                $pass1 = md5($pass1);
                                mysqli_query($con, "UPDATE `admin` SET `password` = '$pass1' WHERE `email` = '$email'");
                                mysqli_query($con, "DELETE FROM `password_reset_temp` WHERE `email` = '$email'");
                                echo "<script>alert('Congratulations! Your password has been updated successfully.');</script>";
                                header('location: /Dashboard/index.php');
                            }
                        }
                        ?>
                        <!-- End of Reset Password Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
