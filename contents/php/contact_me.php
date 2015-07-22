<?php
// check if fields passed are empty
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }

$rn = "\r\n";
//sumbission data
$ipaddress = $_SERVER['REMOTE_ADDR'];
$date = date('Y.m.d');
$time = date('H:i:s');

//form data	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
	
// create email body and send it
$to = 'contact@softwarelondon.net'; // put your email
$from    = isset($_POST["email"]) ? $_POST["email"] : "";
$subject = "Contact form submitted by:  $name";

$body =  "<p>You have recieved a new message from the contact form on your website.</p>
		  <p><strong>Name: </strong> {$name} </p>
		  <p><strong>Email: </strong> {$email} </p>
		  <p><strong>Message: </strong> {$message} </p>
		  <p>This message was sent from the IP Address: {$ipaddress} on {$date} at {$time}</p>";

$headers =  'From: ' . $from  . $rn .
			'Reply-To: ' . $email  . $rn .
			'MIME-Version: 1.0' . $rn .
			'Content-Type: text/html; charset=UTF-8' .  $rn .
			'Para: WebSite'  .  $rn .
			'X-Mailer: PHP/' . phpversion();

mail($to,$subject,$body,$headers);
return true;			
?>