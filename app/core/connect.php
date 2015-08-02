<?php
$dbHost = 'localhost'; // MySQL host
$dbUsername = 'root'; // MySQL username
$dbPassword = 'password'; // MySQL password
$dbDatabase = 'database'; // MySQL database name

$connectMe = mysqli_connect("$dbHost","$dbUsername","$dbPassword", "$dbDatabase") or die ("could not connect to mysql");
?>