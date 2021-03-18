<?php 
session_start();
include('header.php');
include_once("db_connect.php");
?>
<title>Money cashL</title>
<script type="text/javascript" src="script/ajax.js"></script>

<?php
if(isset($_SESSION['user_id'])){
   $user_id= $_SESSION['user_id'];
   $email=$_SESSION['email'];
   $username=$_SESSION['user_name'];
   $country=$_SESSION['country'];
   $ssn=$_SESSION['ssn'];
   $birth= $_SESSION['date_of_birth'];
   $zip=$_SESSION['zip'];
   $address=$_SESSION['address'];
   $id_type=$_SESSION['id_type'];
   $id_number=$_SESSION['id_number'];
}else{
	header('location:login.php');
  echo "you need to login first";
}
?>
</head>
<body class="">
<div role="navigation" class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="index.php" class="navbar-brand">ACCOUNT INFO</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active" style=" background: black;"><a href="index.php">Home</a></li>
            <li class="active"><a href="passwordchange.php">Change password<br><small style="color: blue;">changing your password is a good idea</small></a>
             </li>
            <li class="active"><a href="logout.php">logout</a></li>
