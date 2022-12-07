<?php

defined('_ROOT') or die(__FILE__);
if(!isset($_SESSION['user_id']) && !isset($_SESSION['position'])){
	header("Location: ".$domain."login");
	exit;
}


if($_SESSION['chucvu_id'] == 0 ||$_SESSION['chucvu_id'] == 1 || $_SESSION['chucvu_id'] == 2)
{


	$tpl->setfile(array(
		'tpl_meta'=>'tpl_meta.tpl',
		'tpl_header'=>'tpl_header.tpl',
		'tpl_navbar'=>'tpl_navbar.tpl',
		'tpl_body'=>'luongtaixe.tpl',
		'tpl_footer'=>'tpl_footer.tpl',

	));

	if($_GET['code'] == '' &&$_GET['thang'] == 0 &&$_GET['nam'] == 0 )
	{
		
		//lấy tháng và năm mới nhất trong bảng lương
		$thang_nam = $model->db->query("SELECT thang,nam FROM php_luongtaixe GROUP BY id DESC LIMIT 1 ");

		$thang_and_nam = $thang_nam->fetch();
		if($thang_nam->num_rows() == 1)
		{



		//Phân trang
		$taixe = $oContent->view_table('php_luongtaixe',"thang=".$thang_and_nam['thang']." AND nam=".$thang_and_nam['nam']);
		//lấy tổng số phần tử tin 
		$total = $taixe->num_rows();


		while($rs = $taixe->fetch()){
			
			$rs['id_security'] = $oClass->id_encode($rs['id']);
			$rs['user_id_security'] = $oClass->id_encode($rs['user_id']);
			//xu lý active

			if($rs['active'] == 0){
				$rs['active'] = ' class="active-account-die"';
				$rs['edit_delete'] = '';
			}
			else if($rs['active'] == 1){
				$rs['active'] = ' class="active-account"';
				$rs['edit_delete'] = ' remove';

			}
			$rs2['tongluong_thang'] += $rs['tong_luong'];
			//Xu lý hiển thị tên user
			if($rs['user_id']!= 0){
				$id_taixe = $model->db->query("SELECT * FROM php_taixe WHERE id =".$rs['user_id']);
				while($rs_join = $id_taixe->fetch()){
				
					$rs['name_taixe'] = $rs_join['name_taixe'];
				}
			}

			// format tien te
			$rs['tong_luong'] = number_format($rs['tong_luong'], 0, ',', '.') . "VND";
			$rs['thuong_nong'] = number_format($rs['thuong_nong'], 0, ',', '.') . "VND";
			$rs['luong_thoa_thuan'] = number_format($rs['luong_thoa_thuan'], 0, ',', '.') . "VND";
			$rs['tong_ungluong'] = number_format($rs['tong_ungluong'], 0, ',', '.') . "VND";
			$rs['tong_so_ngay_nghi_khong_phep'] = number_format($rs['tong_so_ngay_nghi_khong_phep'], 0, ',', '.') . "VND";
			$rs['tien_bao_hiem'] = number_format($rs['tien_bao_hiem'], 0, ',', '.') . "VND";
			$rs['tang_ca'] = number_format($rs['tang_ca'], 0, ',', '.') . "VND";
			$rs['phu_cap'] = number_format($rs['phu_cap'], 0, ',', '.') . "VND";
			$rs['sanluong_hoanthanh'] = number_format($rs['sanluong_hoanthanh'], 0, ',', '.') . "VND";
				
			$tpl->assign($rs,'detail');

			
		}
		$tpl->merge($thang_and_nam,'thang_nam');
		$rs2['tongluong_thang'] = number_format($rs2['tongluong_thang'], 0, ',', '.') . "VND";
			$tpl->merge($rs2,'tong');
		}
	}
	else{
		
		
		$rs2['thang'] =  $_GET['thang'];
		$rs2['nam'] = $_GET['nam'];

		
			
			if(isset($_GET['code'])){
				$id = $oClass->id_decode($_GET['code']);
				$id_where = ' AND id ='.$id;
			}
			if(isset($_GET['thang'])){
				$thang_where = ' AND thang ='.$_GET['thang'];
			}
			if(isset($_GET['nam'])){
				$nam_where = ' AND nam ='.$_GET['nam'];
			}
		
			

			//Phân trang
			$phieu_chi_search =  $model->db->query("SELECT * FROM php_luongtaixe WHERE active < 5".$id_where.$thang_where.$nam_where);
			//lấy tổng số phần tử tin 
			$total = $phieu_chi_search->num_rows();
			if($total >= 1) {
				$limit = 10;
				$start = $limit*intval($_GET['page']);
				$url = $system->root_dir.'luongtaixe';
				$dp = new paging($url,$total,$limit);
				$dp->current = '<a class="active_page">%d</a>';
				$tpl->assign(array('divpage'=>$dp->simple(10)));
		
		
				$phieu_chi_search = $oContent->view_pagination('php_luongtaixe',"active < 5".$id_where.$thang_where.$nam_where."  ORDER BY id DESC",$start,$limit);
		
				
				while($rs = $phieu_chi_search->fetch()){
					
					$rs['id_security'] = $oClass->id_encode($rs['id']);
					$rs['user_id_security'] = $oClass->id_encode($rs['user_id']);
					//xu lý active
		
					if($rs['active'] == 0){
						$rs['active'] = ' class="active-account-die"';
						$rs['edit_delete'] = '';
					}
					else if($rs['active'] == 1){
						$rs['active'] = ' class="active-account"';
						$rs['edit_delete'] = ' remove';
		
					}
		
					//Xu lý hiển thị tên user
					if($rs['user_id']!= 0){
						$id_loaichi = $model->db->query("SELECT * FROM php_nhansu WHERE id =".$rs['user_id']);
						while($rs_join = $id_loaichi->fetch()){
						
							$rs['name'] = $rs_join['name'];
						}
					}
					$rs2['tongluong_thang'] += $rs['tong_luong'];
					// format tien te
					$rs['tong_luong'] = number_format($rs['tong_luong'], 0, ',', '.') . "VND";
					$rs['thuong_nong'] = number_format($rs['thuong_nong'], 0, ',', '.') . "VND";
					$rs['luong_thoa_thuan'] = number_format($rs['luong_thoa_thuan'], 0, ',', '.') . "VND";
					$rs['tong_ungluong'] = number_format($rs['tong_ungluong'], 0, ',', '.') . "VND";
					$rs['tien_bao_hiem'] = number_format($rs['tien_bao_hiem'], 0, ',', '.') . "VND";
					$rs['tang_ca'] = number_format($rs['tang_ca'], 0, ',', '.') . "VND";
				
					$rs['tong_so_ngay_nghi_khong_phep'] = number_format($rs['tong_so_ngay_nghi_khong_phep'], 0, ',', '.') . "VND";
					$rs['phu_cap'] = number_format($rs['phu_cap'], 0, ',', '.') . "VND";
					
					$tpl->assign($rs,'detail');

					$tpl->merge($rs,'thang_nam');
					
				}

				$rs2['tongluong_thang'] = number_format($rs2['tongluong_thang'], 0, ',', '.') . "VND";
				$tpl->merge($rs2,'tong');
			}
			else{
				
				header("Location: ".$domain."luongtaixe");
				exit;
			}
			
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
		$meta['title'] = 'Lương tài xế';

		$meta['icon'] = 'data/upload/cover.jpg';
		$tpl->merge($meta,'meta');
	}
else{
	$id_security = $oClass->id_encode($_SESSION['user_id']);
	header("Location: ".$domain."luongtaixe/v/?code=".$id_security);
	exit;
}

