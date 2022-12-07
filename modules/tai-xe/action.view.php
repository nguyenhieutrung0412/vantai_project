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
	'tpl_body'=>'taixe.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));

$arr = array(0,1);
if(in_array($_SESSION['chucvu_id'],$arr)){
	$tpl->box('boxadmin');
}
//Phân trang
$tai_xe = $oContent->view_table('php_taixe');
//lấy tổng số phần tử tin 
$total = $tai_xe->num_rows();

$limit = 20;
$start = $limit*intval($_GET['page']);
$url = $system->root_dir.'tai-xe';
$dp = new paging($url,$total,$limit);
$dp->current = '<a class="active_page">%d</a>';
$tpl->assign(array('divpage'=>$dp->simple(10)));


$tai_xe = $oContent->view_pagination('php_taixe',1,$start,$limit);


while($rs = $tai_xe->fetch()){
	
	$rs['id_security'] = $oClass->id_encode($rs['id']);
	//xu lý active

	if($rs['active'] == 0){
		$rs['active'] = ' class="active-account-die"';
	}
	else if($rs['active'] == 1){
		$rs['active'] = ' class="active-account"';
	}

	// format tien te
	$rs['format_luong'] = number_format($rs['luong_taixe'], 0, ',', '.') . "VND";
	$rs['phu_cap'] = number_format($rs['phu_cap'], 0, ',', '.') . "VND";
	$rs['tien_baohiem'] = number_format($rs['tien_baohiem'], 0, ',', '.') . "VND";


	$tpl->assign($rs,'detail');
	
	
}
$meta = array();
$meta['title'] = 'Tài xế';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');





