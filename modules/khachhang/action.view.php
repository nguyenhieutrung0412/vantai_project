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
	'tpl_body'=>'khachhang.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));

//Phân trang
$khach_hang = $oContent->view_table('php_khachhang');
//lấy tổng số phần tử tin 
$total = $khach_hang->num_rows();

$limit = 20;
$start = $limit*intval($_GET['page']);
$url = $system->root_dir.'khachhang';
$dp = new paging($url,$total,$limit);
$dp->current = '<a class="active_page">%d</a>';
$tpl->assign(array('divpage'=>$dp->simple(10)));


$khach_hang = $oContent->view_pagination('php_khachhang',1,$start,$limit);

while($rs = $khach_hang->fetch()){
	
	$rs['id_security'] = $oClass->id_encode($rs['id']);
	$tpl->assign($rs,'detail');
	
	
}

$meta = array();
$meta['title'] = 'Quản lí khách hàng';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');





