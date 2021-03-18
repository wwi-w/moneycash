<?php
require "db_connect.php";
$error=false;
if(isset($_POST['send'])){
    $fulname = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$body = mysqli_real_escape_string($conn, $_POST['body']);
	$message=mysqli_real_escape_string($conn,$_POST['message']);


    if(empty($email)){
        $error=true;
        $email_error="please provide your email";
    }
    if(empty($fulname)){
        $error=true;
        $fulname_error="you must enter you fullname";
    }
    if(empty($message)){
        $error=true;
        $message_error="please provide us a message..";
    }
    if(empty($body)){
        $error=true;
        $body_error="body of the letter cannot be empty";
    }

    if(!$error){
        if(mysqli_query($conn, "INSERT INTO contact(fulname,email,body,messages) VALUE ('".$fulname."','".$email."','" . $body . "','" . $message . "')")){
            $success_message="Your Message have been Successfully sent we will notify you withing 24hours";

        }else{
            $error_message="Error in Sendind..Message";
        }

    }
}
?>



<head>
        <title>Contacts US</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:url" content="">
<meta property="og:type" content="article">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta property="og:title" content="claim your free money from moneycash">
<meta property="og:description" content="click here to claim it">
<meta property="og:image" content="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0ALf79_X_jnkTfeyU_tB7CI_WWtzZqjj-KA&usqp=CAU">
        <link href='custom.css' rel='stylesheet' type='text/css'>
    </head>
    <body>

        <div class="container">
          
            <div class="row">
            <span class="text-success"><?php if(isset($success_message)) { echo $success_message; } ?></span>
			<span class="text-danger"><?php if(isset($error_message)) { echo $error_message; } ?></span>
                <div class="col-xl-8 offset-xl-2 py-5">
                <h1 style="font-family: Arial, Helvetica, sans-serif; text-align:center;">contacs us</h1>
                <p></p>
                <br>
                    <!-- We're going to place the form here in the next step -->
                    <form id="contact-form" method="post" action="" role="form">

    <div class="messages"></div>

    <div class="controls">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">Full Name</label>
                    <input id="form_name" type="text" name="name" value="<?php if($error) echo $fulname;  ?>" class="form-control" placeholder="Please enter your fullname..." data-error="Firstname is required.">
                    <span class="text-danger"><?php if(isset($fulname_error)) echo $fulname_error; ?></span>
             
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_email">Email</label>
                    <input id="form_email" type="email" name="email" value="<?php if($error) echo $error;?>" class="form-control" placeholder="Please enter your email...." data-error="Valid email is required.">
                    <span class="text-danger"><?php if(isset($email_error)) echo $email_error ;?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_lastname">Body</label>
                    <input id="form_lastname" type="text" name="body" value="<?php if($error) echo $body; ?>" class="form-control" placeholder="Please entert body of your message.. "  data-error="Lastname is required.">
                    <span class="text-danger"><?php if(isset($body_error)) echo $body_error;?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="form_message">Message *</label>
                    <textarea id="form_message" name="message" class="form-control"  placeholder="your message....." rows="4" data-error="Please, leave us a message."></textarea>
                    <span class="text-danger"><?php if(isset($message_error)) echo $message_error; ?></span>
                </div>
            </div>
            <div class="col-md-12">
                <input type="submit" name="send" class="btn btn-success btn-send" value="Send message">
            </div>
        </div>
    </div>

</form>

                </div>

            </div>

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>
        <script src="contact.js"></script>
    </body>
</html>