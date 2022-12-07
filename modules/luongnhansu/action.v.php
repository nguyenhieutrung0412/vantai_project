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
	'tpl_body'=>'list_luongnhansu.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));


	if(!isset($_GET['thang']) || !isset($_GET['nam']))
	{
		if(isset($_GET['code'])){
			$id = $oClass->id_decode($_GET['code']);
			$id_where = ' AND user_id ='.$id;
		}

		//Phân trang
		$phieu_chi_search =  $model->db->query("SELECT * FROM php_luongnhansu WHERE active = 1".$id_where);
		//lấy tổng số phần tử tin 
		$total = $phieu_chi_search->num_rows();
		
		$limit = 10;
		$start = $limit*intval($_GET['page']);
		$url = $system->root_dir.'luongnhansu/v';
		$dp = new paging($url,$total,$limit);
		$dp->current = '<a class="active_page">%d</a>';
		$tpl->assign(array('divpage'=>$dp->simple(10)));


		$phieu_chi_search = $oContent->view_pagination('php_luongnhansu',"active = 1".$id_where." ORDER BY id DESC" ,$start,$limit);

	
			
		
		while($rs = $phieu_chi_search->fetch()){
			
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

			
			//xử lý link đường dẫn
			$rs['link']= $domain . 'luongnhansu/detail_v/?code='.$rs['id_security'];

			// format tien te
			$rs['tong_luong'] = number_format($rs['tong_luong'], 0, ',', '.') . "VND";
			$rs['thuong_nong'] = number_format($rs['thuong_nong'], 0, ',', '.') . "VND";
			$rs['luong_thoa_thuan'] = number_format($rs['luong_thoa_thuan'], 0, ',', '.') . "VND";
			$rs['tong_ungluong'] = number_format($rs['tong_ungluong'], 0, ',', '.') . "VND";
			$rs['tien_bao_hiem'] = number_format($rs['tien_bao_hiem'], 0, ',', '.') . "VND";
			$rs['tang_ca'] = number_format($rs['tang_ca'], 0, ',', '.') . "VND";
			$tpl->assign($rs,'detail');
			

			
		}
			//Xu lý hiển thị tên user
		
			$id_loaichi = $model->db->query("SELECT * FROM php_nhansu WHERE id =".$id);
			$rs_join = $id_loaichi->fetch();
			
			$rs['name'] = $rs_join['name'];
		$tpl->merge($rs,'name');
	}
	else{
		header("Location: ".$domain."luongnhansu/detail_v/?code=".$oClass->id_encode($_SESSION['user_id'])."thang=".htmlentities( $_GET['thang'])."nam=".htmlentities($_GET['nam']));
		exit;
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
$meta['title'] = 'Lương nhân sự';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');


