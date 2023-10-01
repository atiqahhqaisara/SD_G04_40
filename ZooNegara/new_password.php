<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if ($email == false) {
  header('Location: registerSignIn.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a New Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Additional CSS for centering the form */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
            width: 300vh;

        }
        .form {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            display: flex;
            max-width: 700px;
            
        }

       
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 form">
                <form action="new_password.php" method="POST" autocomplete="off">
                

                    <h2 style="text-align: center" class="text-center">New Password</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Create new password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change-password" value="Change Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
