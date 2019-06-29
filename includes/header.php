<?php
require 'config/config.php';

if(isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
} else {
    header("Location: register.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BBeauties</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    < script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" >
    </script>
    <script src="https://kit.fontawesome.com/cc9c2860e5.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

    <div class="top_bar">
        <div class="logo">
            <a href="index.php">BBeauties</a>
        </div>

        <nav>
            <a href="<?php echo $userLoggedIn; ?>">
                <?php echo $user['first_name']; ?>
            </a>
            <a href="index.php">
                <i class="fas fa-home fa-lg"> </i>
            </a>
            <a href="#">
                <i class="fas fa-envelope fa-lg"> </i>
            </a>
            <a href="#">
                <i class="far fa-bell fa-lg"></i>
            </a>
            <a href="#">
                <i class="fas fa-users fa-lg"></i>
            </a>
            <a href="#">
                <i class="fas fa-cog fa-lg"></i>
            </a>
            <a href="includes/handlers/logout.php">
                <i class="fas fa-sign-out-alt fa-lg"></i>
            </a>
        </nav>
    </div>

    <div class="wrapper">