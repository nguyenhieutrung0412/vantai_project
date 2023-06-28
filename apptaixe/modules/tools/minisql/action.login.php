<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);


$ga = new gapi($cfg['ga_email'],$cfg['ga_pasw'],isset($_SESSION['ga'])?$_SESSION['ga']:NULL);
if($_SESSION['ga']['token'] = $ga->getAuthToken()){
	$_SESSION['ga']['ga_emai'] = $cfg['ga_email'];
	$_SESSION['ga']['ga_pasw'] = $cfg['ga_pasw'];	
	echo '1';
}else{
	echo '0';
}
exit();
?>
