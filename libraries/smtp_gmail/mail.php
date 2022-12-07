<?php
	date_default_timezone_set('Asia/Ho_Chi_Minh');
include 'PHPMailerAutoload.php';

function SendGMail($frommail,$tomail,$subject,$fromname,$body){
	$mail = new PHPMailer;
	//$mail->charSet = "UTF-8";
	$mail->setLanguage("vi");
	$mail->CharSet = "UTF-8";
	$mail->isSMTP();
	
	$mail->SMTPDebug = 0;
	$mail->Debugoutput = 'html';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = 'mh.phin@gmail.com';
	$mail->Password = 'Phin@29111986@351656010';
	
	$mail->setFrom($frommail,$fromname);
	
	//=>gửi nhiều địa chỉ email
	foreach($tomail as $email => $name)	{
		 $mail->addAddress($email, $name);
	}
	
	//$mail->addAddress($tomail);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->IsHTML(true);
	
	if(!$mail->send()){
			//die("Mailer Error: " . $mail->ErrorInfo);
			return false;
	}else{
			//die("Message sent!");
			return true;
	}
}


function SendMail($frommail,$tomail=array(),$subject,$fromname,$body){
	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	$mail->setLanguage("vi");
	$mail->CharSet = "UTF-8";
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	//Set the hostname of the mail server
	$mail->Host = "mail.logisviet.com";
	//Set the SMTP port number - likely to be 25, 465 or 587
	$mail->SMTPAutoTLS = false; 
	$mail->Port = 25;
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication
	$mail->Username = "admin@logisviet.com";
	//Password to use for SMTP authentication
	$mail->Password = "l6d1yQq4pi";
	//Set who the message is to be sent from
	$mail->setFrom($frommail,$fromname);
	//Set an alternative reply-to address
	//$mail->addAddress($tomail, 'Du Lich Nang Moi');
	
	//=>gửi nhiều địa chỉ email
	foreach($tomail as $email => $name)	{
		 $mail->addAddress($email, $name);
	}

	//Set the subject line
	$mail->Subject = $subject;
	//Read an HTML message body from an external file, convert referenced images to embedded,
	$mail->msgHTML($body);
	
	//Replace the plain text body with one created manually
	//$mail->AltBody = 'This is a plain-text message body';
	
	//send the message, check for errors
	if (!$mail->send()) {
		 //echo "Mailer Error: " . $mail->ErrorInfo;
		 return false;
	} else {
		// echo "Message sent!";
		 return true;
	}
}