<?php

/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);
if($_SESSION['admin_login']) $hook->redirect('./');
$msg = array();
if($_POST){
	$phone = addslashes($_POST['phone']);
	$password = addslashes($_POST['pwd']);
	$result = $oClass->view(" `phone_taixe` = '$phone' AND `pwd` = MD5('$password') AND `active` = 1");
	if($result->num_rows()){
		$_SESSION['admin_login'] = $result->fetch();
		//print_r($_SESSION);
		$oMaster->user_log('Logged in');
		$hook->redirect('./?token='.$token);
	}else{
		$msg['error'] = 'Username/Password is invalid!';
	}
	
	
}

$tpl->reset();

$tpl->setfile(array(
	'body'=>'user.login.tpl',
));
$tpl->assign($msg);

?>