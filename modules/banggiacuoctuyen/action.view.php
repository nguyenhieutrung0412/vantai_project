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
	'tpl_body'=>'banggiacuoctuyen.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));


//Phân trang
$loai_hang = $oContent->view_table('php_banggiacuoc_tuyen');
//lấy tổng số phần tử tin 
$total = $loai_hang->num_rows();

$limit = 20;
$start = $limit*intval($_GET['page']);
$url = $system->root_dir.'loaihang';
$dp = new paging($url,$total,$limit);
$dp->current = '<a class="active_page">%d</a>';
$tpl->assign(array('divpage'=>$dp->simple(10)));


$loai_hang = $oContent->view_pagination('php_banggiacuoc_tuyen',1,$start,$limit);


while($rs = $loai_hang->fetch()){
	
	$rs['id_security'] = $oClass->id_encode($rs['id']);
	//xu lý active

	if($rs['active'] == 0){
		$rs['active'] = ' class="active-account-die"';
	}
	else if($rs['active'] == 1){
		$rs['active'] = ' class="active-account"';
	}



	// format tien te
	$rs['so_tien'] = number_format($rs['so_tien'], 0, ',', '.') . "VND";
	$rs['km'] = number_format($rs['km'], 0, ',', '.') . " Km";
	$tpl->assign($rs,'detail');
	
	
}

$meta = array();
$meta['title'] = 'Bảng giá cước theo tuyến';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');






