<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);
class Email  {
	var $to;
	var $to_name = '';
	var $tpl;
	var $subject;
	var $is_smtp = true;
	var $is_html = true;
	var $language  = array();
	var $body;
	
	
	///
	var $smtp;
	function __construct($to,$subject,$email_template){
		$this->tpl = new bTemplate(_ROOT.'email/'); 
		$this->to = $to;
		$this->subject = $subject;
		$this->tpl->setfile(array(
			'__main__'=>'master.tpl',
			'body'=>$email_template
		));
	}
	function connect($cfg){
		$this->smtp = $cfg;
	}
	
	function send(){
		$mail = new PHPMailer();
		$mail->CharSet = 'UTF-8';
		if($this->smtp['smtp_enable']) $mail->IsSMTP();
		if($this->smtp['smtp_auth']) $mail->SMTPAuth = true; 
		$mail->Host = $this->smtp['smtp_server'];
		$mail->Port = $this->smtp['smtp_port'];
		$mail->Username = $this->smtp['smtp_usr'] ;
		$mail->Password = $this->smtp['smtp_psw']; 
		if($this->smtp['smtp_from_email']){
			$mail->From = $this->smtp['smtp_from_email'];
			$mail->FromName = $this->smtp['smtp_from_name'];
		}
		$mail->AddAddress($this->to,$this->to_name); 
		if($this->smtp['smtp_reply_email']){
			$mail->AddReplyTo($this->smtp['smtp_reply_email'],$this->smtp['smtp_reply_email']);
		}
		$mail->WordWrap = 50;
		$mail->IsHTML($this->is_html); 
		$mail->Subject = $this->subject;
		$mail->Body = $this->tpl->parse();
		$mail->AltBody = "";
		return $mail->Send();
	}
}
?>