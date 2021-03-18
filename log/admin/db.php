
<?php
$username = "adeniran1234";
$password = "JOShua123@#";
$database = "users";
$host="mysql-23766-0.cloudclusters.net:23808";
$db = mysqli_connect($host,$username,$password,$database);

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>
