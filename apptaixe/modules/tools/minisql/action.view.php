<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);
$tpl->setfile(array(
	'body'=>'analytic.tpl',
));

if(!$_SESSION['ga']){
	$tpl->box('ga_login');
}else{
	$tpl->box('ga_account');
}
?>
