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
	'tpl_body'=>'phieuthu.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));


//Phân trang
$phieu_chi = $oContent->view_table('php_phieuthu');
//lấy tổng số phần tử tin 
$total = $phieu_chi->num_rows();

$limit = 20;
$start = $limit*intval($_GET['page']);
$url = $system->root_dir.'phieuthu';
$dp = new paging($url,$total,$limit);
$dp->current = '<a class="active_page">%d</a>';
$tpl->assign(array('divpage'=>$dp->simple(10)));


$phieu_chi = $oContent->view_pagination('php_phieuthu',"1 GROUP BY id DESC",$start,$limit);


while($rs = $phieu_chi->fetch()){
	
	$rs['id_security'] = $oClass->id_encode($rs['id']);
	//xu lý active

	if($rs['active'] == 0){
		$rs['active'] = ' class="active-account-die"';
		$rs['edit_delete'] = '';
	}
	else if($rs['active'] == 1){
		$rs['active'] = ' class="active-account"';
		$rs['edit_delete'] = ' remove';

	}

	if($rs['ngaygio_xetduyet'] == NULL){
		$rs['ngaygio_xetduyet'] = "Chưa được xét duyệt";
		$rs['color-red'] = "color-0";
	}

	//Xu lý hiển thị tên loai chi
	if($rs['loai_thu']!= 0){
		$id_loaichi = $model->db->query("SELECT * FROM php_loaithu WHERE id =".$rs['loai_thu']);
		while($rs_join = $id_loaichi->fetch()){
		
			$rs['loai_thu_name'] = $rs_join['loaithu'];
		}
	 }


	// format tien te
	$rs['sotien_thu'] = number_format($rs['sotien_thu'], 0, ',', '.') . "";

	$tpl->assign($rs,'detail');
	
	
}

//danh sách loai chi 
//lấy danh sách khách hàng

$list_loaithu = $oContent->view_table('php_loaithu');
$list_loaithu = $hook->format($list_loaithu);

while($rs = $list_loaithu->fetch()){
	$id_secutity_first = rand(1111111,9999999);
	$id_secutity_last = rand(1111111,9999999);
	$rs['id_security_kh'] =$id_secutity_first . $rs['id'] .$id_secutity_last;
	$tpl->assign($rs,'list_loaithu');	
}
$meta = array();
$meta['title'] = 'Phiếu thu';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');




