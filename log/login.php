<?php 
ob_start();
include('header.php');
include_once("db_connect.php");
session_start();
if(isset($_SESSION['user_id'])!="") {
	header("Location: index.php");
}
if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email. "' and pass = '" .$password. "'");
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['user_id'] = $row['uid'];
		$_SESSION['user_name'] = $row['user'];
		$_SESSION['email']=$row['email'];
		$_SESSION['lastname']=$row['lastname'];
		$_SESSION['country']=$row['country'];
		$_SESSION['address']=$row['adress'];
		$_SESSION['city']=$row['city'];
		$_SESSION['date_of_birth']=$row['date_of_birth'];
		$_SESSION['zip']=$row['zip_code'];
		$_SESSION['id_type']=$row['id_type'];
		$_SESSION['id_number']=$row['id_number'];
		$_SESSION['ssn']=$row['ssn'];
		

		header("Location: index.php");
	} else {
		$error_message = "Incorrect Email or Password!!!";
	}
}
?>
<title>moneycash</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:url" content="">
<meta property="og:type" content="article">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:title" content="claim your free money from moneycash">
<meta property="og:description" content="click here to claim it">
<meta property="og:image" content="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0ALf79_X_jnkTfeyU_tB7CI_WWtzZqjj-KA&usqp=CAU">
<script type="text/javascript" src="script/ajax.js"></script>
<link rel="stylesheet" type="text/css" href="custom.css">
<script type="text/javascript" src="script/ajax.js"></script>
<script type="text/javascript" src="script/ajax.js"></script>
<?php include('container.php');?>
      <div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
		
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend>Login</legend>
					<span class="text-danger" style="text-align: center;"><?php if (isset($error_message)) { echo $error_message; } ?></span>						
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Your Email" required class="form-control" />
					</div>	
					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Your Password" required class="form-control" />
					</div>	
					<div class="btn">
						<input type="submit" name="login" value="Login" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
		</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		Not a user of moneycash <a href="register.php">Sign Up Here</a>
		</div>
	</div>
<?php include('footer.php');?> 
