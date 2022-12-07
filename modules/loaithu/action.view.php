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
	'tpl_body'=>'loaithu.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));


//Phân trang
$loai_thu = $oContent->view_table('php_loaithu');
//lấy tổng số phần tử tin 
$total = $loai_thu->num_rows();

$limit = 10;
$start = $limit*intval($_GET['page']);
$url = $system->root_dir.'loaithu';
$dp = new paging($url,$total,$limit);
$dp->current = '<a class="active_page">%d</a>';
$tpl->assign(array('divpage'=>$dp->simple(10)));


$loai_thu = $oContent->view_pagination('php_loaithu',1,$start,$limit);


while($rs = $loai_thu->fetch()){
	
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

	// format tien te
	$rs['hanmucthu'] = number_format($rs['hanmucthu'], 0, ',', '.') . "VND";
	if($rs['hanmucthu'] == 0){
		$rs['hanmucthu'] = ' không giới hạn';
	}
	$tpl->assign($rs,'detail');
	
	
}

$meta = array();
$meta['title'] = 'Loại thu';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');






