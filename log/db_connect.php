<?php
/* Database connection start */
$servername = "mysql-23766-0.cloudclusters.net:23808";
$username = "adeniran1234";
$password = "JOShua123@#";
$dbname = "users";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("failed to connect: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
