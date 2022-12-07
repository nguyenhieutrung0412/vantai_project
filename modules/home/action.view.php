<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

if(!isset($_SESSION['user_id']) && !isset($_SESSION['position'])){
	header("Location: ".$domain."login");
	exit;
}

$tpl->setfile(array(
	'tpl_meta'=>'tpl_meta.tpl',
	'tpl_header'=>'tpl_header.tpl',
	'tpl_navbar'=>'tpl_navbar.tpl',
	'tpl_body'=>'home.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));

$nhansu = $oContent->view_table('php_nhansu');
while($rs_nhansu = $nhansu->fetch()){
	$tpl->assign($rs_nhansu,'nhansu');
}

$total['nhansu'] = $nhansu->num_rows();

$doixe = $oContent->view_table('php_doixe');
$total['doixe'] = $doixe->num_rows();

$doixe = $oContent->view_table('php_taixe');
$total['taixe'] = $doixe->num_rows();
$donhang = $oContent->view_table('php_donhangtrongoi');
$donhangtrongoi =$donhang->num_rows();
$donhangroi = $oContent->view_table('php_donhangroi');
$tong_roi =$donhangroi->num_rows();
$total['donhang'] = $donhangtrongoi + $tong_roi;

$tpl->merge($total,'total');

$html = $oHtml->get(1);
$html = $hook->format($html);


$meta = array();
$meta['title'] = 'Dashboard';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');

$tpl->merge($html,'detail');