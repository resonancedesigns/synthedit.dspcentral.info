<?php
error_reporting(E_ALL & ~E_NOTICE);
require_once '../core/connect.php';
if(isset($_POST['username'])) {
    $username = mysqli_real_escape_string($connectMe, $_POST['username']);
    $check = mysqli_query($connectMe, "SELECT username FROM users WHERE username='$username'") or die (mysqli_error($connectMe));
    $check_num_rows = mysqli_num_rows($check);
    if (strlen($username)<=4) {
        echo "Username must be at least five characters long.";
    } else {
        if($check_num_rows==0) {
            echo "This username is available!";
        } elseif ($check_num_rows==1) {
            echo "This username has already been claimed by someone.";
        }
    }
} 
if(isset($_POST['password'])) {
    $password = mysqli_real_escape_string($connectMe, $_POST['password']);
    $check = mysqli_query($connectMe, "SELECT username FROM users WHERE username='$username'") or die (mysqli_error($connectMe));
    $check_num_rows = mysqli_num_rows($check);
    if (strlen($password)<=7) {
        echo "Password must be at least eight characters long.";
    } 
} 