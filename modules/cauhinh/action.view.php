<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);
if(!isset($_SESSION['user_id']) && !isset($_SESSION['position']) && $_SESSION['active'] == 0){
	header("Location: ".$domain."login");
	exit;
}

$tpl->setfile(array(
	'tpl_meta'=>'tpl_meta.tpl',
	'tpl_header'=>'tpl_header.tpl',
	'tpl_body'=>'cauhinh.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));
$cauhinh = $oContent->view_table('php_cauhinh','id = 1 ' );
$rs = $cauhinh->fetch();

$rs['id_security'] = $oClass->id_encode($rs['id']);
$tpl->merge($rs,'detail');

$meta = array();
$meta['title'] = 'Cấu hình';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');










