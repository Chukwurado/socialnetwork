<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "social");

$timezone = date_default_timezone_set('America/New_York');

if(mysqli_connect_errno()){
    echo "Failed to connect: " . mysqli_connect_errno();
}
?>