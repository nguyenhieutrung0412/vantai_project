<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

$data = $_SESSION['admin_login']['data']?unserialize($_SESSION['admin_login']['data']):array();
$data['menu'][intval($_POST['menuid'])] = intval($_POST['status']);
$_SESSION['admin_login']['data'] = serialize($data);
$oClass->update($login_user['id'],array('data'=>$_SESSION['admin_login']['data']));


exit();


?>