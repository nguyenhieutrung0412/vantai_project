<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);
//ob_start("ob_html_compress");
if(isset($_SESSION['user_id'])){
	header("Location: ".$domain);
}

$tpl->setfile(array(
	'tpl_body'=>'login.tpl',
));






