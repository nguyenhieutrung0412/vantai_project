<?php

defined('_ROOT') or die(__FILE__);
if(!isset($_SESSION['user_id']) && !isset($_SESSION['position'])){
	header("Location: ".$domain."login");
	exit;
}
$tpl->setfile(array(
	'tpl_meta'=>'tpl_meta.tpl',
	'tpl_header'=>'tpl_header.tpl',
	'tpl_navbar'=>'tpl_navbar.tpl',
	'tpl_body'=>'menu.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));



//Phân trang
$menu = $oContent->view_table('php_menu');
//lấy tổng số phần tử tin 
$total = $menu->num_rows();

while($rs = $menu->fetch()){
	
	$rs['id_security'] = $oClass->id_encode($rs['id']);
	//xu lý active

	if($rs['active'] == 0){
		$rs['active'] = ' class="active-account-die"';
	}
	else if($rs['active'] == 1){
		$rs['active'] = ' class="active-account"';
	}
	$tpl->assign($rs,'detail');
}

//Phân trang
$menu_sub = $oContent->view_table('php_menu_phanquyen');
//lấy tổng số phần tử tin 
$total = $menu_sub->num_rows();

$limit = 20;
$start = $limit*intval($_GET['page']);
$url = $system->root_dir.'menuadmin';
$dp = new paging($url,$total,$limit);
$dp->current = '<a class="active_page">%d</a>';
$tpl->assign(array('divpage'=>$dp->simple(10)));


$menu_sub = $oContent->view_pagination('php_menu_phanquyen',1,$start,$limit);


while($rs = $menu_sub->fetch()){
	
	$rs['id_security'] = $oClass->id_encode($rs['id']);

	//Xu lý hiển thị tên menu
	if($rs['id_menu_cha']!= 0){
		$id_menu_cha = $model->db->query("SELECT * FROM php_menu WHERE id =".$rs['id_menu_cha']);
		while($rs_join = $id_menu_cha->fetch()){
		
			$rs['name_menu'] = $rs_join['name_menu'];
		}
	 }
	//xu lý active
	$tpl->assign($rs,'detail2');

}
$meta = array();
$meta['title'] = 'Menu setting';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');





