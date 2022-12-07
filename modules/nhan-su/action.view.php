<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);
if(!isset($_SESSION['id_taixe']) && !isset($_SESSION['position']) && $_SESSION['active'] == 0){
	header("Location: ".$domain."login");
	exit;
}

$tpl->setfile(array(
	'tpl_meta'=>'tpl_meta.tpl',
	'tpl_header'=>'tpl_header.tpl',
	'tpl_navbar'=>'tpl_navbar.tpl',
	'tpl_body'=>'nhan-su.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));

$arr = array(0,1);
if(in_array($_SESSION['chucvu_id'],$arr)){
	$tpl->box('boxadmin');
}


//Phân trang
$nhan_su = $oContent->view_table('php_nhansu');
//lấy tổng số phần tử tin 
$total = $nhan_su->num_rows();

$limit = 20;
$start = $limit*intval($_GET['page']);
$url = $system->root_dir.'nhan-su';
$dp = new paging($url,$total,$limit);
$dp->current = '<a class="active_page">%d</a>';
$tpl->assign(array('divpage'=>$dp->simple(10)));


$nhan_su = $oContent->view_pagination('php_nhansu',1,$start,$limit);


while($rs = $nhan_su->fetch()){
	
	$rs['id_security'] = $oClass->id_encode($rs['id']);
	
	//xu lý active

	if($rs['active'] == 0){
		$rs['active'] = ' class="active-account-die"';
	}
	else if($rs['active'] == 1){
		$rs['active'] = ' class="active-account"';
	}
	// format tien te
	$rs['format_luong'] = number_format($rs['luong_nhansu'], 0, ',', '.') . "VND";
	$rs['phu_cap'] = number_format($rs['phu_cap'], 0, ',', '.') . "VND";
	$rs['tien_baohiem'] = number_format($rs['tien_baohiem'], 0, ',', '.') . "VND";
	

	$tpl->assign($rs,'detail');
	
	
}
//lấy danh sách chức vụ

$list_chucvu = $oContent->view_table('php_phongban');
$list_chucvu = $hook->format($list_chucvu);

while($rs = $list_chucvu->fetch()){
	$id_secutity_first = rand(1111111,9999999);
	$id_secutity_last = rand(1111111,9999999);
	$rs['id_security_chucvu'] =$id_secutity_first . $rs['id'] .$id_secutity_last;
	$tpl->assign($rs,'list_chucvu');	
}




$meta = array();
$meta['title'] = 'Nhân sự';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');