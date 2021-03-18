<?php 
ob_start();
include('header.php');
include_once("db_connect.php");
session_start();
if(isset($_SESSION['user_id'])) {
	header("Location: index.php");
}
$error = false;
if (isset($_POST['signup'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$lname = mysqli_real_escape_string($conn, $_POST['lastname']);
	$middle_name=mysqli_real_escape_string($conn,$_POST['middle']);
	$address=mysqli_real_escape_string($conn,$_POST['adress']);
    $city=mysqli_real_escape_string($conn,$_POST['city']);
	$date_of_birth=mysqli_real_escape_string($conn,$_POST['date_of_birth']);
    $zip= mysqli_real_escape_string($conn,$_POST['zip_code']);
	$id_type=mysqli_real_escape_string($conn,$_POST['id_type']);
	$id_number=mysqli_real_escape_string($conn,$_POST['id_number']);
	$ssn=mysqli_real_escape_string($conn,$_POST['ssn']);
	$country=mysqli_real_escape_string($conn, $_POST['country']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
	#midd1
	
	#addr2
	if(empty($address)){
		$error=true;
		$address_error="your Street Adress is required";
		
	}
	#zip3
	if(empty($zip)){
		$error=true;
		$zip_error="zip code is required";
	}
	if(!is_numeric($zip)){
		$error=true;
		$zip_error="zip code must contain only numbers";
	}
	#ssn4
	if(empty($ssn)){
		$error=true;
		$ssn_error="SSN cannaot be empty";
	}
	if(strlen($ssn)<9){
		$error=true;
		$ssn_error="please enter a valid SSN number";
	}
	#dar5
	if(empty($date_of_birth)){
		$error=true;
		$date_of_birth_error="please select your date of birth";
	}
	#fnmae6
	if (!preg_match("/^[a-zA-Z]+$/",$name)) {
		$error = true;
		$uname_error = "FirstName must contain only alphabets";
	}
	if(empty($name)){
		$error=true;
		$uname_error="first name is required";
	}
	#lname7
	if (!preg_match("/^[a-zA-Z ]+$/",$lname)) {
		$error = true;
		$lname_error = "Name must contain only alphabets and space";
	}
	if(empty($lname)){
		$error=true;
		$lname_error="Last Name is Required";
	}
	if(empty($id_number)){
		$error=true;
		$id_number_error="ID Number is required";
	}
	#idtype13
	if(empty($id_type)){
		$error=true;
		$id_type_error="ID Type is required";
	}
	if(empty($city)){
		$error=true;
		$city_error="city name is required";
	}
	#email8
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}
	if (empty($email)){
		$error=true;
		$email_error="Email is Required";
	}
	#pass9
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	#cp10
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password doesn't match";
	}
	if(empty($password)){
		$error=true;
		$password_error="password is required";
	}
	#state11
	if (!$error) {
		if(mysqli_query($conn, "INSERT INTO users(user, email,lastname,middle_name,date_of_birth,adress,city,zip_code,id_type,id_number,ssn,country, pass) VALUES('" . $name . "', '" . $email . "','" . $lname . "','" . $middle_name . "','" . $date_of_birth . "','" . $address . "','" . $city . "','" . $zip . "','" . $id_type . "','" . $id_number . "','" . $ssn . "','" . $country . "', '" . $password . "')")) {
			$success_message = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
		} else {
			$error_message = "Error in registering...Please try again later!";
		}
	}
}
?>
<style>
.text-danger input .form-control{
	border-color: red;
	
}

</style>
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
<?php include('container.php');?>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend style="text-align: center;">Sign Up for Money cash</legend>
					<span class="text-success"><?php if(isset($success_message)) { echo $success_message; } ?></span>
			<span class="text-danger"><?php if(isset($error_message)) { echo $error_message; } ?></span>

					<div class="form-group">
						<label for="name">First Name</label>
						<span class="text-danger">
						<input type="text" name="name" placeholder="First Name"  value="<?php if($error) echo $name; ?>" class="form-control is-invalid" />
						<?php if (isset($uname_error)) echo $uname_error; ?></span>
						
					</div>
					<div class="form-group">
						<label for="name">Middle Name  (Optional)</label>
						<input type="text"  placeholder="Middle Name" value="" name="middle" value="" class="form-control is-invalid" />
						
					</div>
					<div class="form-group">
						<label for="name">Last Name</label>
						<input type="text" name="lastname" placeholder="Last Name"  value="<?php if($error) echo $lname; ?>" class="form-control is-invalid" />
						<span class="text-danger"><?php if (isset($lname_error)) echo $lname_error; ?></span>
					</div>
					
					
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Email"  value="<?php if($error) echo $email; ?>" class="form-control is-invalid" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>
	       <div class="form-group">
						<label for="name">Date of birth</label>
						<input type="date" name="date_of_birth" placeholder="Email"  value="" class="form-control is-invalid" />
						<span class="text-danger"><?php if(isset($date_of_birth_error)) echo $date_of_birth_error;?></span>
					</div>
		<!--
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Zip</label>
      <input type="text" class="form-control" id="validationCustom05" required>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
	</div>-->
					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" value="<?php if($error) echo $password; ?>" placeholder="Password"  class="form-control is-invalid" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Confirm Password</label>
						<input type="password" name="cpassword" placeholder="Confirm Password" class="form-control is-invalid" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					</div>
					<!--city-->
					
				  
	<br>
	<div class="col">
	<label for="name">Street Address</label>
      <input type="text" class="form-control is-invalid" value="" name="adress" placeholder="your street adress..">
	  <span class="text-danger"><?php if (isset($address_error)) echo $address_error; ?></span>
    </div>
	<br>
	<div class="form-group">
                  <label for="validationCustom03">City</label>
                  <input type="text" class="form-control is-invalid" name="city" value="" id="validationCustom03" placeholder="city">
				  <span class="text-danger"><?php if (isset($city_error)) echo $city_error; ?></span>
                  </div>
				  <div class="form-row">
    
<div class="form-group">
     <label for="inputState">State</label>
<select id="inputState" class="form-control is-invalid" required name="country">
    <option selected>Select your country</option>
	<option value="Afganistan">Afghanistan</option>
   <option value="Albania">Albania</option>
   <option value="Algeria">Algeria</option>
   <option value="American Samoa">American Samoa</option>
   <option value="Andorra">Andorra</option>
   <option value="Angola">Angola</option>
   <option value="Anguilla">Anguilla</option>
   <option value="Antigua & Barbuda">Antigua & Barbuda</option>
   <option value="Argentina">Argentina</option>
   <option value="Armenia">Armenia</option>
   <option value="Aruba">Aruba</option>
   <option value="Australia">Australia</option>
   <option value="Austria">Austria</option>
   <option value="Azerbaijan">Azerbaijan</option>
   <option value="Bahamas">Bahamas</option>
   <option value="Bahrain">Bahrain</option>
   <option value="Bangladesh">Bangladesh</option>
   <option value="Barbados">Barbados</option>
   <option value="Belarus">Belarus</option>
   <option value="Belgium">Belgium</option>
   <option value="Belize">Belize</option>
   <option value="Benin">Benin</option>
   <option value="Bermuda">Bermuda</option>
   <option value="Bhutan">Bhutan</option>
   <option value="Bolivia">Bolivia</option>
   <option value="Bonaire">Bonaire</option>
   <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
   <option value="Botswana">Botswana</option>
   <option value="Brazil">Brazil</option>
   <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
   <option value="Brunei">Brunei</option>
   <option value="Bulgaria">Bulgaria</option>
   <option value="Burkina Faso">Burkina Faso</option>
   <option value="Burundi">Burundi</option>
   <option value="Cambodia">Cambodia</option>
   <option value="Cameroon">Cameroon</option>
   <option value="Canada">Canada</option>
   <option value="Canary Islands">Canary Islands</option>
   <option value="Cape Verde">Cape Verde</option>
   <option value="Cayman Islands">Cayman Islands</option>
   <option value="Central African Republic">Central African Republic</option>
   <option value="Chad">Chad</option>
   <option value="Channel Islands">Channel Islands</option>
   <option value="Chile">Chile</option>
   <option value="China">China</option>
   <option value="Christmas Island">Christmas Island</option>
   <option value="Cocos Island">Cocos Island</option>
   <option value="Colombia">Colombia</option>
   <option value="Comoros">Comoros</option>
   <option value="Congo">Congo</option>
   <option value="Cook Islands">Cook Islands</option>
   <option value="Costa Rica">Costa Rica</option>
   <option value="Cote DIvoire">Cote DIvoire</option>
   <option value="Croatia">Croatia</option>
   <option value="Cuba">Cuba</option>
   <option value="Curaco">Curacao</option>
   <option value="Cyprus">Cyprus</option>
   <option value="Czech Republic">Czech Republic</option>
   <option value="Denmark">Denmark</option>
   <option value="Djibouti">Djibouti</option>
   <option value="Dominica">Dominica</option>
   <option value="Dominican Republic">Dominican Republic</option>
   <option value="East Timor">East Timor</option>
   <option value="Ecuador">Ecuador</option>
   <option value="Egypt">Egypt</option>
   <option value="El Salvador">El Salvador</option>
   <option value="Equatorial Guinea">Equatorial Guinea</option>
   <option value="Eritrea">Eritrea</option>
   <option value="Estonia">Estonia</option>
   <option value="Ethiopia">Ethiopia</option>
   <option value="Falkland Islands">Falkland Islands</option>
   <option value="Faroe Islands">Faroe Islands</option>
   <option value="Fiji">Fiji</option>
   <option value="Finland">Finland</option>
   <option value="France">France</option>
   <option value="French Guiana">French Guiana</option>
   <option value="French Polynesia">French Polynesia</option>
   <option value="French Southern Ter">French Southern Ter</option>
   <option value="Gabon">Gabon</option>
   <option value="Gambia">Gambia</option>
   <option value="Georgia">Georgia</option>
   <option value="Germany">Germany</option>
   <option value="Ghana">Ghana</option>
   <option value="Gibraltar">Gibraltar</option>
   <option value="Great Britain">Great Britain</option>
   <option value="Greece">Greece</option>
   <option value="Greenland">Greenland</option>
   <option value="Grenada">Grenada</option>
   <option value="Guadeloupe">Guadeloupe</option>
   <option value="Guam">Guam</option>
   <option value="Guatemala">Guatemala</option>
   <option value="Guinea">Guinea</option>
   <option value="Guyana">Guyana</option>
   <option value="Haiti">Haiti</option>
   <option value="Hawaii">Hawaii</option>
   <option value="Honduras">Honduras</option>
   <option value="Hong Kong">Hong Kong</option>
   <option value="Hungary">Hungary</option>
   <option value="Iceland">Iceland</option>
   <option value="Indonesia">Indonesia</option>
   <option value="India">India</option>
   <option value="Iran">Iran</option>
   <option value="Iraq">Iraq</option>
   <option value="Ireland">Ireland</option>
   <option value="Isle of Man">Isle of Man</option>
   <option value="Israel">Israel</option>
   <option value="Italy">Italy</option>
   <option value="Jamaica">Jamaica</option>
   <option value="Japan">Japan</option>
   <option value="Jordan">Jordan</option>
   <option value="Kazakhstan">Kazakhstan</option>
   <option value="Kenya">Kenya</option>
   <option value="Kiribati">Kiribati</option>
   <option value="Korea North">Korea North</option>
   <option value="Korea Sout">Korea South</option>
   <option value="Kuwait">Kuwait</option>
   <option value="Kyrgyzstan">Kyrgyzstan</option>
   <option value="Laos">Laos</option>
   <option value="Latvia">Latvia</option>
   <option value="Lebanon">Lebanon</option>
   <option value="Lesotho">Lesotho</option>
   <option value="Liberia">Liberia</option>
   <option value="Libya">Libya</option>
   <option value="Liechtenstein">Liechtenstein</option>
   <option value="Lithuania">Lithuania</option>
   <option value="Luxembourg">Luxembourg</option>
   <option value="Macau">Macau</option>
   <option value="Macedonia">Macedonia</option>
   <option value="Madagascar">Madagascar</option>
   <option value="Malaysia">Malaysia</option>
   <option value="Malawi">Malawi</option>
   <option value="Maldives">Maldives</option>
   <option value="Mali">Mali</option>
   <option value="Malta">Malta</option>
   <option value="Marshall Islands">Marshall Islands</option>
   <option value="Martinique">Martinique</option>
   <option value="Mauritania">Mauritania</option>
   <option value="Mauritius">Mauritius</option>
   <option value="Mayotte">Mayotte</option>
   <option value="Mexico">Mexico</option>
   <option value="Midway Islands">Midway Islands</option>
   <option value="Moldova">Moldova</option>
   <option value="Monaco">Monaco</option>
   <option value="Mongolia">Mongolia</option>
   <option value="Montserrat">Montserrat</option>
   <option value="Morocco">Morocco</option>
   <option value="Mozambique">Mozambique</option>
   <option value="Myanmar">Myanmar</option>
   <option value="Nambia">Nambia</option>
   <option value="Nauru">Nauru</option>
   <option value="Nepal">Nepal</option>
   <option value="Netherland Antilles">Netherland Antilles</option>
   <option value="Netherlands">Netherlands (Holland, Europe)</option>
   <option value="Nevis">Nevis</option>
   <option value="New Caledonia">New Caledonia</option>
   <option value="New Zealand">New Zealand</option>
   <option value="Nicaragua">Nicaragua</option>
   <option value="Niger">Niger</option>
   <option value="Nigeria">Nigeria</option>
   <option value="Niue">Niue</option>
   <option value="Norfolk Island">Norfolk Island</option>
   <option value="Norway">Norway</option>
   <option value="Oman">Oman</option>
   <option value="Pakistan">Pakistan</option>
   <option value="Palau Island">Palau Island</option>
   <option value="Palestine">Palestine</option>
   <option value="Panama">Panama</option>
   <option value="Papua New Guinea">Papua New Guinea</option>
   <option value="Paraguay">Paraguay</option>
   <option value="Peru">Peru</option>
   <option value="Phillipines">Philippines</option>
   <option value="Pitcairn Island">Pitcairn Island</option>
   <option value="Poland">Poland</option>
   <option value="Portugal">Portugal</option>
   <option value="Puerto Rico">Puerto Rico</option>
   <option value="Qatar">Qatar</option>
   <option value="Republic of Montenegro">Republic of Montenegro</option>
   <option value="Republic of Serbia">Republic of Serbia</option>
   <option value="Reunion">Reunion</option>
   <option value="Romania">Romania</option>
   <option value="Russia">Russia</option>
   <option value="Rwanda">Rwanda</option>
   <option value="St Barthelemy">St Barthelemy</option>
   <option value="St Eustatius">St Eustatius</option>
   <option value="St Helena">St Helena</option>
   <option value="St Kitts-Nevis">St Kitts-Nevis</option>
   <option value="St Lucia">St Lucia</option>
   <option value="St Maarten">St Maarten</option>
   <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
   <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
   <option value="Saipan">Saipan</option>
   <option value="Samoa">Samoa</option>
   <option value="Samoa American">Samoa American</option>
   <option value="San Marino">San Marino</option>
   <option value="Sao Tome & Principe">Sao Tome & Principe</option>
   <option value="Saudi Arabia">Saudi Arabia</option>
   <option value="Senegal">Senegal</option>
   <option value="Seychelles">Seychelles</option>
   <option value="Sierra Leone">Sierra Leone</option>
   <option value="Singapore">Singapore</option>
   <option value="Slovakia">Slovakia</option>
   <option value="Slovenia">Slovenia</option>
   <option value="Solomon Islands">Solomon Islands</option>
   <option value="Somalia">Somalia</option>
   <option value="South Africa">South Africa</option>
   <option value="Spain">Spain</option>
   <option value="Sri Lanka">Sri Lanka</option>
   <option value="Sudan">Sudan</option>
   <option value="Suriname">Suriname</option>
   <option value="Swaziland">Swaziland</option>
   <option value="Sweden">Sweden</option>
   <option value="Switzerland">Switzerland</option>
   <option value="Syria">Syria</option>
   <option value="Tahiti">Tahiti</option>
   <option value="Taiwan">Taiwan</option>
   <option value="Tajikistan">Tajikistan</option>
   <option value="Tanzania">Tanzania</option>
   <option value="Thailand">Thailand</option>
   <option value="Togo">Togo</option>
   <option value="Tokelau">Tokelau</option>
   <option value="Tonga">Tonga</option>
   <option value="Trinidad & Tobago">Trinidad & Tobago</option>
   <option value="Tunisia">Tunisia</option>
   <option value="Turkey">Turkey</option>
   <option value="Turkmenistan">Turkmenistan</option>
   <option value="Turks & Caicos Is">Turks & Caicos Is</option>
   <option value="Tuvalu">Tuvalu</option>
   <option value="Uganda">Uganda</option>
   <option value="United Kingdom">United Kingdom</option>
   <option value="Ukraine">Ukraine</option>
   <option value="United Arab Erimates">United Arab Emirates</option>
   <option value="United States of America">United States of America</option>
   <option value="Uraguay">Uruguay</option>
   <option value="Uzbekistan">Uzbekistan</option>
   <option value="Vanuatu">Vanuatu</option>
   <option value="Vatican City State">Vatican City State</option>
   <option value="Venezuela">Venezuela</option>
   <option value="Vietnam">Vietnam</option>
   <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
   <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
   <option value="Wake Island">Wake Island</option>
   <option value="Wallis & Futana Is">Wallis & Futana Is</option>
   <option value="Yemen">Yemen</option>
   <option value="Zaire">Zaire</option>
   <option value="Zambia">Zambia</option>
   <option value="Zimbabwe">Zimbabwe</option>
      </select>
    </div>
	<!--id type,ssn, id number-->
	<div class="form-group">
      <label for="inputZip">Zip Code</label>
      <input type="tel"  class="form-control is-invalid" name="zip_code" value="" id="inputZip" placeholder="zip code">
      <span class="text-danger"><?php if(isset($zip_error)) echo $zip_error; ?></span>
	</div>
	<div class="form-group">
      <label for="inputZip">ID Type</label>
      <input type="text"  class="form-control is-invalid" value="" id="" name="id_type" placeholder="ID TYPE">
      <span class="text-danger"><?php if(isset($id_type_error)) echo $id_type_error; ?></span>    
	</div>
	<div class="form-group">
      <label for="inputZip">ID Number</label>
      <input type="text"  class="form-control is-invalid" value="" id="" name="id_number" placeholder="ID Number">
      <span class="text-danger"><?php if(isset($id_number_error)) echo $id_number_error; ?></span>
    </div>
	<div class="form-group">
      <label for="inputZip">SSN</label>
      <input type="tel"  class="form-control is-invalid" value="" maxlength="9" id="" name="ssn" placeholder="SSN">
	  <span class="text-danger"><?php if(isset($ssn_error)) echo $ssn_error; ?></span>
    </div>

					<div class="btn">
						<input type="submit" name="signup" value="Register Me" class="btn btn-primary btn-lg" />
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		Already Registered? <a href="login.php">Login Here</a>
		</div>	
</div>
<?php include('footer.php');?> 