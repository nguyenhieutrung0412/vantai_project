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
	'tpl_body'=>'detail_luongnhansu.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));


	if(!isset($_GET['thang']) || !isset($_GET['nam']))
	{
		header("Location: ".$domain."luongnhansu/v?code=".$oClass->id_encode($_SESSION['user_id']));
		exit;
	}
	else{
		if(isset($_GET['code'])){
			$id = $oClass->id_decode($_GET['code']);
			$id_where = ' AND id ='.$id;
		}
		if(isset($_GET['thang'])){
			$thang_where = ' AND thang ='.htmlentities($_GET['thang']);
		}
		if(isset($_GET['nam'])){
			$nam_where = ' AND nam ='.htmlentities($_GET['nam']);
		}

		//Phân trang
		$phieu_chi_search =  $model->db->query("SELECT * FROM php_luongnhansu WHERE active = 1".$id_where. $thang_where. $nam_where." LIMIT 1");
		//lấy tổng số phần tử tin 
		$total = $phieu_chi_search->num_rows();
		
		if($total == 1){

		
			$rs = $phieu_chi_search->fetch();
			
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

			//Xu lý hiển thị tên user
			if($rs['user_id']!= 0){
				$id_loaichi = $model->db->query("SELECT * FROM php_nhansu WHERE id =".$rs['user_id'] ." LIMIT 1");
				$rs_join = $id_loaichi->fetch();
				$rs['name'] = $rs_join['name'];
			}
            //xử lý ngày nghi
            $ngaynghi = $oContent->view_table('php_ngaynghi' ,' user_id = '.$rs['user_id'].' AND thang= '.$rs['thang'] .' AND nam='.$rs['nam']);

            while ($rs_ngaynghi= $ngaynghi->fetch())
            {
                $arr[] =  $rs_ngaynghi['ngay'];
                $arr[] =  $rs_ngaynghi['tinhtrang'];
            }

			
			
			//format thang english
			$rs['thang_english'] = date("F", mktime(0, 0, 0, $rs['thang'], 10));
            //xử lý hiển thị lịch

            //set your timezone
            //date_default_timezone_set('Asia/Ho_Chi_Minh');

            $calendar = new Calendar();
            $rs['calendar'] = $calendar->show($arr);

			// format tien te
			$rs['tong_luong'] = number_format($rs['tong_luong'], 0, ',', '.') . "";
			$rs['thuong_nong'] = number_format($rs['thuong_nong'], 0, ',', '.') . "";
			$rs['luong_thoa_thuan'] = number_format($rs['luong_thoa_thuan'], 0, ',', '.') . "";
			$rs['tong_ungluong'] = number_format($rs['tong_ungluong'], 0, ',', '.') . "";
			$rs['tien_bao_hiem'] = number_format($rs['tien_bao_hiem'], 0, ',', '.') . "";
			$rs['tang_ca'] = number_format($rs['tang_ca'], 0, ',', '.') . "";
			$rs['phu_cap'] = number_format($rs['phu_cap'], 0, ',', '.') . "";
			$rs['tong_so_ngay_nghi_khong_phep'] = number_format($rs['tong_so_ngay_nghi_khong_phep'], 0, ',', '.') . "";
			
			
			$tpl->merge($rs,'detail');
		}
		else{
			header("Location: ".$domain."luongnhansu/v?code=".$oClass->id_encode($_SESSION['user_id']));
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
$meta['title'] = 'Lương nhân sự';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');






