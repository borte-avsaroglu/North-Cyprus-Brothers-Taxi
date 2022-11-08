<?php
include_once('connection.php');

	//Content
	$name = isset($_POST['name']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name']) : "";
	$surname = isset($_POST['surname']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_POST['surname']) : "";
	$senderEmail = isset($_POST['email']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email']) : "";
	$phone = isset($_POST['phone']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['phone']) : "";
	$message = isset($_POST['message']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['message']) : "";
	$date = isset($_POST['date']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['date']) : "";
	$time = isset($_POST['time']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['time']) : "";

// Define Host Info || Who is sending emails?
define("HOST_NAME", "Brothers Taxi");
define("HOST_EMAIL", "info@brotherstourism.com");

// Define SMTP Credentials || Gmail Informations
define("SMTP_EMAIL", "info@brotherstourism.com");
define("SMTP_PASSWORD", "your_gmail_pass"); // read documentations

// Define Recipent Info ||  Who will get this email?
define("RECIPIENT_NAME", "$name $surname");
define("RECIPIENT_EMAIL", "$senderEmail");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$sql_stmt = "INSERT INTO contact_form (customer,email,phone,date,message)
                                       VALUES('$name $surname','$senderEmail','$phone','$date','$message')";
        $result = mysqli_query($db, $sql_stmt);
		if($result){
			$map['dbresult'] = 'success';
		}else{
			$map['dbresult'] = 'error';
		}

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


try {
	//Server settings
	$mail->SMTPDebug = 0;                      //Enable verbose debug output
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'mail.brotherstourism.com';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = SMTP_EMAIL;                     //SMTP username
	$mail->Password   = SMTP_PASSWORD;                               //SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
	$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

	//Recipients
	$mail->setFrom(HOST_EMAIL, HOST_NAME);
	$mail->addAddress(RECIPIENT_EMAIL, RECIPIENT_NAME);     //Add a recipient

	$mail->isHTML(true);                                  //Set email format to HTML
	$mail->Subject = 'Thanks for contact us!';
	$mail->Body    = '' . "<br><br>";
	$mail->Body .= 'Name: ' . RECIPIENT_NAME . "<br>";
	$mail->Body .= 'Email: ' . RECIPIENT_EMAIL . "<br>";
	$mail->Body .= 'Phone: ' . $phone . "<br>";

	if ($date) {
		$mail->Body .= 'Date: ' . $date .' '. $time . "<br>";
	}
	if ($message) {
		$mail->Body .= 'Your message: ' . $message . "<br>";
	}

	
	$mail->send();
	$map['mailcustomerresult'] = 'success';
	$map['mailcustomermessage'] = "<div class='inner success'><p class='success'><i class='ico'>&#10004;</i> Thanks for contacting us. We will contact you ASAP!</p></div><!-- /.inner -->";
} catch (Exception $e) {
	$map['mailcustomerresult'] = 'error';
	$map['mailcustomermessage'] = "<div class='inner error'><p class='error'><i class='ico'>&#9747;</i> Message could not be sent. Please try again, If you have problems, contact us <a href='tel:+905338605864'>+905338605864</a></p></div><!-- /.inner -->";
}

$mail = new PHPMailer(true);

try {
	//Server settings
	$mail->SMTPDebug = 0;                      //Enable verbose debug output
	$mail->isSMTP();                                            //Send using SMTP
	$mail->Host       = 'mail.brotherstourism.com';                     //Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
	$mail->Username   = SMTP_EMAIL;                     //SMTP username
	$mail->Password   = SMTP_PASSWORD;                               //SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
	$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

	//Recipients
	$mail->setFrom(HOST_EMAIL, HOST_NAME);
	$mail->addAddress(HOST_EMAIL, RECIPIENT_NAME);     //Add a recipient

	$mail->isHTML(true);                                  //Set email format to HTML
	$mail->Subject = 'Contact from customer.';
	$mail->Body    = 'Name: ' . RECIPIENT_NAME . "<br>";
	$mail->Body .= 'Email: ' . RECIPIENT_EMAIL . "<br>";
	$mail->Body .= 'Phone: ' . $phone . "<br>";

	if ($date) {
		$mail->Body .= 'Date: ' . $date .' '. $time . "<br>";
	}
	if ($message) {
		$mail->Body .= 'Your message: ' . $message . "<br>";
	}

	$mail->send();
} catch (Exception $e) {
	$result = "<div class='inner error'><p class='error'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</p></div><!-- /.inner -->";
}

//Thanks for contacting us. We will contact you ASAP!

echo json_encode($map);
