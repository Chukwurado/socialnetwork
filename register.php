<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bi-Curious Beauties</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="assets\css\register_style.css">
</head>

<body>

    <div class="wrapper">

        <div class="login_box">
            <div class="login_header">
                <h1>Bi-Curious Beauties</h1>
                Login or Sign up
            </div>
            <div id="first">
                <form action="register.php" method="POST">
                    <input type="email" name="log_email" placeholder="Email Address" value="
                    <?php 
                        if(isset($_SESSION['log_email'])) {
                            echo $_SESSION['log_email'];
                        } 
                    ?>" required>
                    <br>

                    <?php
                    if(in_array("Email or password was incorrect<br>", $error_array)) {
                            echo "Email or password was incorrect<br>";
                    } 
                    ?>

                    <input type="password" name="log_password" placeholder="Password">
                    <br>
                    <input type="submit" name="login_button" value="Login">
                    <br>
                    <a href="#" id="signup" class="signup">Need an account? Register here</a>

                </form>
            </div>

            <br>

            <div id="second">
                <form action="register.php" method="POST">
                    <input type="text" name="reg_fname" placeholder="First Name" value="<?php 
                    if(isset($_SESSION['reg_fname'])) {
                        echo $_SESSION['reg_fname'];
                    } 
                    ?>" required>
                    <br>

                    <?php if(in_array("Your First Name must be less than 25 <br>", $error_array)) {
                        echo "Your First Name must be less than 25 <br>";
                    } ?>


                    <input type="text" name="reg_lname" placeholder="Last Name" value="<?php if(isset($_SESSION['reg_lname']))
                            echo $_SESSION['reg_lname'];?>" required>
                    <br>

                    <?php if(in_array("Your Last Name must be less than 25 <br>", $error_array)) {
                        echo "Your Last Name must be less than 25 <br>";
                    } ?>


                    <input type="email" name="reg_email" placeholder="Email" value="<?php 
                        if(isset($_SESSION['reg_email'])) {
                            echo $_SESSION['reg_email'];
                        } 
                    ?>" required>
                    <br>


                    <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php 
                        if(isset($_SESSION['reg_email2'])) {
                            echo $_SESSION['reg_email2'];
                        } 
                    ?>" required>
                    <br>
                    <?php
                        if(in_array("Email already in use<br>", $error_array)) {
                            echo "Email already in use<br>";
                        } 
                        else if(in_array("Invalid email<br>", $error_array)) {
                            echo "Invalid email<br>";
                        }
                        else if(in_array("Emails don't match <br>", $error_array)) {
                            echo "Emails don't match <br>";
                        }
                    ?>


                    <input type="password" name="reg_password" placeholder="Enter Password" required>
                    <br>
                    <input type="password" name="reg_password2" placeholder="Confirm Password" required>
                    <br>
                    <?php if(in_array("Your password can only contain english characters or numbers <br>", $error_array)) {
                        echo "Your password can only contain english characters or numbers <br>";
                    } ?>
                    <?php if(in_array("Passwords do not match <br>", $error_array)) {
                    echo "Passwords do not match <br>";
                } ?>
                    <?php if(in_array("Password must be between 5 and 30 <br>", $error_array)) {
            echo "Password must be between 5 and 30 <br>";
        } ?>

                    <input type="submit" name="register_button" value="Register">
                    <br>

                    <?php if(in_array("<span style='color: #14C800'>You're all set! Go ahead and login</span>", $error_array)) {
            echo "<span style='color: #14C800'>You're all set! Go ahead and login</span>";
        } ?>

                    <a href="#" id="signin" class="login">Already have an account? Login here</a>
                </form>
            </div>


        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</body>

</html>