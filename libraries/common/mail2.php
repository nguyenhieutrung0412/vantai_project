<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
include _ROOT. 'libraries/phpmailer/PHPMailerAutoload.php';

function SendGMail($frommail,$tomail,$fromname,$subject,$body){
	$mail = new PHPMailer;
	$mail->charSet = "UTF-8";
	$mail->isSMTP();
	
	$mail->SMTPDebug = 0;
	$mail->Debugoutput = 'html';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "thichthotthang@gmail.com";
	$mail->Password = "29111986@351656010";
	
	$mail->setFrom($frommail,$fromname);
	$mail->addAddress($tomail);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->IsHTML(true);
	
	if(!$mail->send()){
			//echo "Mailer Error: " . $mail->ErrorInfo;
			return false;
	}else{
			//echo "Message sent!";
			return true;
	}
}

//SendGMail('officesaigon.vn@gmail.com','hpmcontact@gmail.com','Phin test php74','PHP74 subject','Content PHP7.4 here!');
?>