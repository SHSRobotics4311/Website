<?php
	require 'email/PHPMailerAutoload.php';
	
	$mail = new PHPMailer;
	
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'SHSRobotics4311@gmail.com';
	$mail->Password = 'team4311';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 645;
	
	$errorMsg = "Are you sure you've filled in all of the fields?";
	if (isset($_POST['email'])) {
		$mail->From = $_POST['email'];
		$mail->FromName = 'Mailer';
	} else {
		return errorMsg; //Email not set..?
	} if (isset($_POST['name'])) {
		$mail->Subject = $_POST['name'];
	} else {
		return errorMsg; //Name not set..?
	} if (isset($_Post['message'])) {
		$mail->Body = $_POST['message'];
	} else {
		return errorMsg; //Email not set..?
	}
	
	$mail->addAddress('SHSRobotics4311@gmail.com', 'Robotics Team');
	$mail->isHTML(false);
	
	if (!$mail->send()) {
		return "Your message could not be sent, please try again later!";
	} else {
		return "Your message has been sent successfully, thanks!"
	}
?>
