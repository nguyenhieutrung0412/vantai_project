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
	'tpl_navbar'=>'tpl_navbar.tpl',
	'tpl_body'=>'phongban.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));

$arr = array(0,1);
if(in_array($_SESSION['chucvu_id'],$arr)){
	$tpl->box('boxadmin');
}


//Phân trang
$nhan_su = $oContent->view_table('php_phongban');
//lấy tổng số phần tử tin 
$total = $nhan_su->num_rows();

$limit = 20;
$start = $limit*intval($_GET['page']);
$url = $system->root_dir.'phongban';
$dp = new paging($url,$total,$limit);
$dp->current = '<a class="active_page">%d</a>';
$tpl->assign(array('divpage'=>$dp->simple(10)));


$nhan_su = $oContent->view_pagination('php_phongban',1,$start,$limit);


while($rs = $nhan_su->fetch()){

	$rs['id_security'] = $oClass->id_encode($rs['id']);
	if($rs['id'] == 0 || $rs['id'] == 1 || $rs['id'] == 2 || $rs['id'] == 3 || $rs['id'] == 4 || $rs['id'] == 5 || $rs['id'] == 6){
		$rs['remove'] ='  remove';
	}
	else{
		$rs['remove'] =' ';
	}
	if($rs['id'] == 0 ){
		unset($rs);
	}
	
	$tpl->assign($rs,'detail');
	
	
}
// get bảng phan quyền
$phanquyen = $oContent->view_table('php_quyen');
$phanquyen = $hook->format($phanquyen);

while($rs = $phanquyen->fetch()){
	$id_secutity_first = rand(1111111,9999999);
	$id_secutity_last = rand(1111111,9999999);
	$rs['id_security_phanquyen'] =$id_secutity_first . $rs['id'] .$id_secutity_last;
	$tpl->assign($rs,'phanquyen');
}
//menu
$menu_phanquyen = $oContent->view_table("php_menu_phanquyen");
while(
$rs_menu = $menu_phanquyen->fetch()){
	$tpl->assign($rs_menu,'menu_phanquyen');
}

$meta = array();
$meta['title'] = 'Phòng ban';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');








