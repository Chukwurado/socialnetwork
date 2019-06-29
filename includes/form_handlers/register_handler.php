<?php
//Declaring variables to prevent erros\rs
$fname = "";
$lname = "";
$em = "";
$em2 = "";
$password = "";
$password2 = "";
$date = "";
$error_array = array();

//if register button is clicked
if(isset($_POST['register_button'])) {

    //Registration from values
    $fname = strip_tags($_POST['reg_fname']);//strip_tag removes any possible html tags
    $fname = str_replace(' ', '', $fname);//remove spcaes
    $fname = ucfirst(strtolower($fname));//Capitalize first letter
    $_SESSION['reg_fname'] = $fname;// store first name to sessions variable

    $lname = strip_tags($_POST['reg_lname']);//strip_tag strips input of any possible html tags
    $lname = str_replace(' ', '', $lname);//remove spcaes
    $lname = ucfirst(strtolower($lname));//Capitalize first letter
    $_SESSION['reg_lname'] = $lname;

    $em = strip_tags($_POST['reg_email']);//strip_tag strips input of any possible html tags
    $em = str_replace(' ', '', $em);//remove spcaes
    $_SESSION['reg_email'] = $em;

    $em2 = strip_tags($_POST['reg_email2']);//strip_tag strips input of any possible html tags
    $em2 = str_replace(' ', '', $em2);//remove spcaes
    $_SESSION['reg_email2'] = $em2;

    $password = strip_tags($_POST['reg_password']);
    $password2 = strip_tags($_POST['reg_password2']);

    $date = date("Y-m-d");

    if($em == $em2){

        if(filter_var($em, FILTER_VALIDATE_EMAIL)){
            $em = filter_var($em, FILTER_VALIDATE_EMAIL);

            //Check if email exists
            $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");

            //Count the number of rows returned
            $num_rows = mysqli_num_rows($e_check);

            if($num_rows > 0){
                array_push($error_array, "Email already in use<br>");
            }

        } else {
            array_push($error_array, "Invalid email<br>"); 
        }

    } else {
        array_push($error_array, "Emails don't match <br>");
    }

    if(strlen($fname) > 25) {
        array_push($error_array, "Your First Name must be less than 25 <br>");
    }

    if(strlen($lname) > 25) {
        array_push($error_array, "Your Last Name must be less than 25 <br>");
    }

    if($password != $password2){
        array_push($error_array, "Passwords do not match <br>");
    } else {
        if(preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($error_array, "Your password can only contain english characters or numbers <br>");
        }
    }
    if(strlen($password) > 30 || strlen($password) < 5) {
        array_push($error_array, "Password must be between 5 and 30 <br>");
    }

    if(empty($error_array)) {
        $password = md5($password);

        $username = strtolower($fname . "_" . $lname);
        $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");

        $i = 0;
        //if username exists
        while(mysqli_num_rows($check_username_query) != 0) {
            $i++;
            $username = $username . "_" . $i;
            $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
        }

        //Profile picture assignment
        $rand = rand(1, 2);
        if($rand == 1){
            $profile_pic = "assets/images/profile_pics/defaults/head_deep_blue.png";
        }
         else {
            $profile_pic = "assets/images/profile_pics/defaults/head_emerald.png";
        }

        $query = mysqli_query($con, "INSERT INTO users VALUES ('', '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");

        array_push($error_array, "<span style='color: #14C800'>You're all set! Go ahead and login</span>");

        //clear session variables
        $_SESSION['reg_fname'] = "";
        $_SESSION['reg_lname'] = "";
        $_SESSION['reg_email'] = "";
        $_SESSION['reg_email2'] = "";

    }
}

?>