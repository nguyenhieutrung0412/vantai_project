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
	'tpl_body'=>'khohang.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));


//Phân trang
$kho = $oContent->view_table('php_kho');
//lấy tổng số phần tử tin 
$total = $kho->num_rows();

$limit = 10;
$start = $limit*intval($_GET['page']);
$url = $system->root_dir.'khohang';
$dp = new paging($url,$total,$limit);
$dp->current = '<a class="active_page">%d</a>';
$tpl->assign(array('divpage'=>$dp->simple(10)));


$kho = $oContent->view_pagination('php_kho',1,$start,$limit);


while($rs = $kho->fetch()){
	
	
	$rs['id_security'] = $oClass->id_encode($rs['id']);
	//xu lý active

	if($rs['active'] == 0){
		$rs['active'] = ' class="active-account-die"';
	}
	else if($rs['active'] == 1){
		$rs['active'] = ' class="active-account"';
	}
	if($rs['baocao'] == 0){
		$rs['baocao'] = ' class="active-account-die"';
	}
	else if($rs['baocao'] == 1){
		$rs['baocao'] = ' class="active-account"';
	}
	//xử lý đơn hàng đang vận chuyển đi 
	$khonhan = $model->db->query('SELECT * FROM php_donhangroi_s WHERE kho_guihang = '.$rs['id'] .' AND tinhtrang_khogui = 0');
	$_count_khoguihang = $khonhan->num_rows();
	if($rs['tinhtrang_khogui'] == 0)
	{
		$rs['tinhtrang_khogui'] = ' Đang vận chuyển';
	}
	else if($rs['tinhtrang_khogui'] == 1)
	{
		$rs['tinhtrang_khogui'] = ' Đã giao';
	}
	$rs['count_khogui'] = $_count_khoguihang;
	//xử lý đơn hàng đang đến kho


	

	$khogiao = $model->db->query('SELECT * FROM php_donhangroi_s WHERE kho_nhanhang = '.$rs['id'].' AND tinhtrang_khonhan = 0');
	$_count_khonhanhang = $khogiao->num_rows();
	if($rs['tinhtrang_khonhan'] == 0)
	{
		$rs['tinhtrang_khonhan'] = ' Đơn hàng đang đến';
	}
	else if($rs['tinhtrang_khonhan'] == 1)
	{
		$rs['tinhtrang_khonhan'] = ' Đã nhận';
	}
	$rs['count_khonhan'] = $_count_khonhanhang;
	// $rs['tong_donhang_taikho'] = $_count_khogiao + $_count_khonhan;
	//
	$truckho = explode(',',$rs['truckho']);
	if($_SESSION['chucvu_id'] != '0' && $_SESSION['chucvu_id'] != '1')
	{
		if(!in_array($_SESSION['user_id'],$truckho))
		{
			unset($rs);
		}
	}
	
	
	$tpl->assign($rs,'detail');
	
	
}

$meta = array();
$meta['title'] = 'Kho hàng';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');






