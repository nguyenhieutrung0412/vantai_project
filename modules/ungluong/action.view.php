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
	'tpl_body'=>'ungluong.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));

if($_GET['code'] == '' &&$_GET['thang'] == 0 &&$_GET['nam'] == 0 )
{
	//Phân trang
	$ungluong = $oContent->view_table('php_ungluong');
	//lấy tổng số phần tử tin 
	$total = $ungluong->num_rows();

	$limit = 20;
	$start = $limit*intval($_GET['page']);
	$url = $system->root_dir.'ungluong';
	$dp = new paging($url,$total,$limit);
	$dp->current = '<a class="active_page">%d</a>';
	$tpl->assign(array('divpage'=>$dp->simple(10)));


	$ungluong = $oContent->view_pagination('php_ungluong',"1 GROUP BY id DESC",$start,$limit);


	while($rs = $ungluong->fetch()){
		
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
		//Xu lý hiển thị tên nhân sự
		if($rs['user_id']!= 0){
			$id_nhansu = $model->db->query("SELECT * FROM php_nhansu WHERE id =".$rs['user_id']);
			while($rs_join = $id_nhansu->fetch()){
			
				$rs['name'] = $rs_join['name'];
			}
		}
		//tong ứng lương tháng
		$tong += $rs['so_tien_ung'];
		// format tien te
		$rs['so_tien_ung'] = number_format($rs['so_tien_ung'], 0, ',', '.') . "";

		$tpl->assign($rs,'detail');
		
		
	}
	$tong_ung['tong_ung_luong'] = $tong;
	// format tien te
	$tong_ung['tong_ung_luong'] = number_format($tong_ung['tong_ung_luong'], 0, ',', '.') . "";
	$tpl->merge($tong_ung,'tong');
}
else{

	if(isset($_GET['thang'])){
		$thang_where = ' AND thang ='.$_GET['thang'];
	}
	if(isset($_GET['nam'])){
		$nam_where = ' AND nam ='.$_GET['nam'];
	}
	//Phân trang
	$ungluong = $oContent->view_table('php_ungluong','active < 5'.$thang_where.$nam_where);
	//lấy tổng số phần tử tin 
	$total = $ungluong->num_rows();

	$limit = 20;
	$start = $limit*intval($_GET['page']);
	$url = $system->root_dir.'ungluong';
	$dp = new paging($url,$total,$limit);
	$dp->current = '<a class="active_page">%d</a>';
	$tpl->assign(array('divpage'=>$dp->simple(10)));


	$ungluong = $oContent->view_pagination('php_ungluong','active < 5'.$thang_where.$nam_where." GROUP BY id DESC",$start,$limit);

	$tong = 0;
	while($rs = $ungluong->fetch()){
		
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
		//Xu lý hiển thị tên nhân sự
		if($rs['user_id']!= 0){
			$id_nhansu = $model->db->query("SELECT * FROM php_nhansu WHERE id =".$rs['user_id']);
			while($rs_join = $id_nhansu->fetch()){
			
				$rs['name'] = $rs_join['name'];
			}
		}
		//tong ứng lương tháng
		$tong += $rs['so_tien_ung'];

		// format tien te
		$rs['so_tien_ung'] = number_format($rs['so_tien_ung'], 0, ',', '.') . "";
		
	
		$tpl->assign($rs,'detail');
		
		
	}
	$tong_ung['tong_ung_luong'] = $tong;
	// format tien te
	$tong_ung['tong_ung_luong'] = number_format($tong_ung['tong_ung_luong'], 0, ',', '.') . "";
	$tpl->merge($tong_ung,'tong');
	
		
}
		//danh sách loai chi 
		//lấy danh sách khách hàng

		$list_nhansu = $oContent->view_table('php_nhansu');
		$list_nhansu = $hook->format($list_nhansu);

		while($rs = $list_nhansu->fetch()){
			$id_secutity_first = rand(1111111,9999999);
			$id_secutity_last = rand(1111111,9999999);
			$rs['id_security_kh'] =$id_secutity_first . $rs['id'] .$id_secutity_last;
			$tpl->assign($rs,'list_nhansu');	
		}

		$meta = array();
		$meta['title'] = 'Ứng lương';

		$meta['icon'] = 'data/upload/cover.jpg';
		$tpl->merge($meta,'meta');







