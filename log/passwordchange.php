<?php 
session_start();
include('header.php');
include_once("db_connect.php");
?>
<title>Moneycash|change password</title>
<script type="text/javascript" src="script/ajax.js"></script>

<?php
if(isset($_SESSION['user_id'])){
   $user_id= $_SESSION['user_id'];
}else{
	header('location:login.php');
  echo "you need to login first";
}
?>

<div class="home">
<?php 
$_SESSION["user_id"]=$user_id;
$error=false;
if(count($_POST)>0){
    $result= mysqli_query($conn,"SELECT *FROM users WHERE uid='".$_SESSION["user_id"]."'");
    $row=mysqli_fetch_array($result);
      $currentpassword=$_POST['current_passwd'];
      $newpassword=$_POST['newpassword'];
      $confirmpasswprd=$_POST['confirmpass'];
      if(strlen($newpassword)<6){
          $error=true;
          $password_error="new password must be greater than 6";
      }
     if(empty($newpassword)){
         $error=true;
         $password_error="new password is required";
     }
     
     if(empty($confirmpasswprd)){
         $error=true;
         $con_error="please confirm your password";
     }
     
      if($newpassword !=$confirmpasswprd){
          $error=true;
          $con_error="Both password do not match";
      }
      if($currentpassword!=$row['pass']){
          $error=true;
          $current_message="your current paasword is incorrect <a href='forgot.php'>did you forgot your password?</a> ";
      }
      if( ! empty($currentpassword) and ($newpassword==$currentpassword)){
          $error=true;
          $thesame="please choose another password,your current password must not the same as new password";
      }
    if(!$error){
   
        if(mysqli_query($conn,"UPDATE users set pass='" . $newpassword."'WHERE uid='".$_SESSION["user_id"]."'")){
            $success="<p style='text-align: center'>password changed successfully </p>";
        }
        else {
        $error_message= "something went worng";
        }  
}
}

?>
</div>
<div class="container">
<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
<span class="text-success"><?php ; if(isset($success)) { echo $success; } ?></span>
			<span class="text-danger" style="text-align: center;"><?php if(isset($error_message)) { echo $error_message; } ?></span>
            <span class="text-danger"  style="text-align: center;"><?php if(isset($thesame)) { echo $thesame; } ?></span>
    <form name="" action="" method="POST" onsubmit="return validatePassword()">
    <div class="form-group">
		<label for="name">Current Password</label>
     <input type="password" name="current_passwd" placeholder="your current password" value="" autocomplete="off" id="currentpassword" class="form-control">
     <span class="text-danger"> <?php if (isset($current_message)) echo $current_message; ?></span>
    </div>
    <div class="form-group">
		<label for="name">New Password</label>
     <input type="password" name="newpassword" value="" class="form-control" placeholder="your new password"id="newpassword" class="form-control">
    <span class="text-danger"> <?php if (isset($password_error)) echo $password_error; ?></span>
    </div>
    <div class="form-group">
		<label for="name">Confirm Password</label>
     <input type="password" name="confirmpass" placeholder="re-type password" value="" id="confirmpassword" class="form-control">
     <span class="text-danger"><?php if (isset($con_error)) echo $con_error; ?></span>
    </div>
    <div class="btn">
     <input type="submit" name="submit" class="btn btn-primary btn-lg" value="change password"  >
    </div>
</form>
        </div>
</div>
</div>
</div>
<?php include('footer.php');?>