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
	'tpl_body'=>'list_luongtaixe.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));


	if(!isset($_GET['thang']) || !isset($_GET['nam']))
	{
		if(isset($_GET['code'])){
			$id = $oClass->id_decode($_GET['code']);
			$id_where = ' AND user_id ='.$id;
		}

		//Phân trang
		$luongtaixe =  $model->db->query("SELECT * FROM php_luongtaixe WHERE active = 1".$id_where);
		//lấy tổng số phần tử tin 
		$total = $luongtaixe->num_rows();
		
		$limit = 10;
		$start = $limit*intval($_GET['page']);
		$url = $system->root_dir.'luongtaixe/v';
		$dp = new paging($url,$total,$limit);
		$dp->current = '<a class="active_page">%d</a>';
		$tpl->assign(array('divpage'=>$dp->simple(10)));


		$luongtaixe = $oContent->view_pagination('php_luongtaixe',"active = 1".$id_where." ORDER BY id DESC" ,$start,$limit);

	
			
		
		while($rs = $luongtaixe->fetch()){
			
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
			$rs['link']= $domain . 'luongtaixe/detail_v/?code='.$rs['id_security'];

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
		
			$id_loaichi = $model->db->query("SELECT * FROM php_taixe WHERE id =".$id);
			$rs_join = $id_loaichi->fetch();
			
			$rs['name'] = $rs_join['name_taixe'];
		$tpl->merge($rs,'name');
	}
	else{
		header("Location: ".$domain."luongtaixe/detail_v/?code=".$oClass->id_encode($_SESSION['user_id'])."thang=".htmlentities( $_GET['thang'])."nam=".htmlentities($_GET['nam']));
		exit;
	}
//danh sách loai chi 


$meta = array();
$meta['title'] = 'Lương tài xế';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');

