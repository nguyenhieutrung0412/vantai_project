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
	'tpl_body'=>'thaylop.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));

if($_GET['code'] == '' &&$_GET['thang'] == 0 &&$_GET['nam'] == 0 )
{		
	if(isset($_GET['from'])  && isset($_GET['to']) ){
		//xử lý lấy tháng năm của ngày đổ dầu
		$thoigian_tu = explode("/",$_GET['from']);
		if(strlen($thoigian_tu[1]) == 1)
		{
			$thoigian_tu[1] = '0'.$thoigian_tu[1];
		}
		//xử lý lưu dữ liệu theo giờ quốc tế
				$gio_quocte_tu = $thoigian_tu[2].'-'.$thoigian_tu[1].'-'.$thoigian_tu[0];
		//end 
		//xử lý lấy tháng năm của ngày đổ dầu
		$thoigian_den = explode("/",$_GET['to']);
		if(strlen($thoigian_den[1]) == 1)
		{
			$thoigian_den[1] = '0'.$thoigian_den[1];
		}
		//xử lý lưu dữ liệu theo giờ quốc tế
				$gio_quocte_den = $thoigian_den[2].'-'.$thoigian_den[1].'-'.$thoigian_den[0];
		//end 
		//xử lý điều kiện từ ngày đến ngày
		$where_from_to = " AND ngay_thaylop BETWEEN '".$gio_quocte_tu."' AND '".$gio_quocte_den."'";
		//end
	}
	if(isset($_GET['taixe']))
	{
		//$id_taixe = explode(";",$_GET['taixe']);
		
		$where_id_taixe =" AND id_taixe IN (".$_GET['taixe'].")";
	}
	if(isset($_GET['xe']))
	{
		//$id_taixe = explode(";",$_GET['taixe']);
		
		$where_id_xe =" AND id_doixe IN (".$_GET['xe'].")";
	}
	if(isset($_GET['donvi']))
	{
		//$id_taixe = explode(";",$_GET['taixe']);
		
		$where_id_donvi =" AND id_donvisuachua IN (".$_GET['donvi'].")";
	}
	$rs2['thang'] =  Date('m');
	$rs2['nam'] = Date('Y');
		//Phân trang
		$kho = $oContent->view_table('php_thaylop');
		//lấy tổng số phần tử tin 
		$total = $kho->num_rows();

		$limit = 20;
		$start = $limit*intval($_GET['page']);
		$url = $system->root_dir.'thaylop';
		$dp = new paging($url,$total,$limit);
		$dp->current = '<a class="active_page">%d</a>';
		$tpl->assign(array('divpage'=>$dp->simple(10)));

		
		$kho = $oContent->view_pagination('php_thaylop',"thang = ".Date('m')." AND nam= ".Date('Y').$where_from_to .$where_id_taixe .$where_id_xe .$where_id_donvi,$start,$limit);

		$stt = 1;
	
		while($rs = $kho->fetch()){
			
				$rs['id_security'] = $oClass->id_encode($rs['id']);
				//xu lý active

				//xử lý các bảng kết nối
					//lấy thông tin taixe
					$tx = $model->db->query("SELECT * FROM php_taixe WHERE id=" . $rs['id_taixe'] . " LIMIT 1");
					$rs_tx = $tx->fetch();
					$rs['name_taixe'] =  $rs_tx['name_taixe'];
					//lấy thông tin xe
					$xe = $model->db->query("SELECT * FROM php_doixe WHERE id=" . $rs['id_doixe'] . " LIMIT 1");
					$rs_xe = $xe->fetch();
					$rs['biensoxe'] =  $rs_xe['biensoxe'];
					$rs['stt'] =  $stt;
					//xử lý tên đơn vị
					$donvi = $model->db->query("SELECT * FROM php_donvi_suachua WHERE id=" . $rs['id_donvisuachua'] . " LIMIT 1");
					$rs_donvi = $donvi->fetch();
					
					 $rs['ten_donvi'] =  $rs_donvi['ten_donvi'];
					 //xu lý active

					if($rs['active'] == 0){
						$rs['active'] = ' class="active-account-die"';
						$rs['edit_delete'] = '';
					}
					else if($rs['active'] == 1){
						$rs['active'] = ' class="active-account"';
						$rs['edit_delete'] = ' remove';
					}
					if($rs['reset'] == 0){
						$rs['reset'] = ' class="active-account-die"';
					
					}
					else if($rs['reset'] == 1){
						$rs['reset'] = ' class="active-account"';
					
					}
					//tổng tiền trong tháng
					$rs2['tong_tien_thang'] +=$rs['tong_tien'];
					
					$rs['tong_tien'] = number_format($rs['tong_tien'], 0, ',', '.') . "";
				
					$stt++;
				// 
				
				$tpl->assign($rs,'detail');
				
				
			}
			$rs2['tong_tien_thang'] = number_format($rs2['tong_tien_thang'], 0, ',', '.') . "";
			$tpl->merge($rs2,'thang_nam');
}
else{
	if(isset($_GET['from'])  && isset($_GET['to']) ){
		//xử lý lấy tháng năm của ngày đổ dầu
		$thoigian_tu = explode("/",$_GET['from']);
		if(strlen($thoigian_tu[1]) == 1)
		{
			$thoigian_tu[1] = '0'.$thoigian_tu[1];
		}
		//xử lý lưu dữ liệu theo giờ quốc tế
				$gio_quocte_tu = $thoigian_tu[2].'-'.$thoigian_tu[1].'-'.$thoigian_tu[0];
		//end 
		//xử lý lấy tháng năm của ngày đổ dầu
		$thoigian_den = explode("/",$_GET['to']);
		if(strlen($thoigian_den[1]) == 1)
		{
			$thoigian_den[1] = '0'.$thoigian_den[1];
		}
		//xử lý lưu dữ liệu theo giờ quốc tế
				$gio_quocte_den = $thoigian_den[2].'-'.$thoigian_den[1].'-'.$thoigian_den[0];
		//end 
		//xử lý điều kiện từ ngày đến ngày
		$where_from_to = " AND ngay_thaylop BETWEEN '".$gio_quocte_tu."' AND '".$gio_quocte_den."'";
		//end
	}
	if(isset($_GET['taixe']))
	{
		//$id_taixe = explode(";",$_GET['taixe']);
		
		$where_id_taixe =" AND id_taixe IN (".$_GET['taixe'].")";
	}
	if(isset($_GET['xe']))
	{
		//$id_taixe = explode(";",$_GET['taixe']);
		
		$where_id_xe =" AND id_doixe IN (".$_GET['xe'].")";
	}
	if(isset($_GET['donvi']))
	{
		//$id_taixe = explode(";",$_GET['taixe']);
		
		$where_id_donvi =" AND id_donvisuachua IN (".$_GET['donvi'].")";
	}
	
	$rs2['thang'] =  $_GET['thang'];
	$rs2['nam'] = $_GET['nam'];
	//Phân trang
	$kho = $oContent->view_table('php_thaylop');
	//lấy tổng số phần tử tin 
	$total = $kho->num_rows();

	$limit = 20;
	$start = $limit*intval($_GET['page']);
	$url = $system->root_dir.'thaylop';
	$dp = new paging($url,$total,$limit);
	$dp->current = '<a class="active_page">%d</a>';
	$tpl->assign(array('divpage'=>$dp->simple(10)));

	
	 $kho = $oContent->view_pagination('php_thaylop',"thang = ".$_GET['thang']." AND nam= ".$_GET['nam'] .$where_from_to .$where_id_taixe .$where_id_xe .$where_id_donvi,$start,$limit);

	$stt = 1;
	while($rs = $kho->fetch()){
		
			$rs['id_security'] = $oClass->id_encode($rs['id']);
			//xu lý active

			//xử lý các bảng kết nối
				//lấy thông tin taixe
				$tx = $model->db->query("SELECT * FROM php_taixe WHERE id=" . $rs['id_taixe'] . " LIMIT 1");
				$rs_tx = $tx->fetch();
				$rs['name_taixe'] =  $rs_tx['name_taixe'];
				//lấy thông tin xe
				$xe = $model->db->query("SELECT * FROM php_doixe WHERE id=" . $rs['id_doixe'] . " LIMIT 1");
				$rs_xe = $xe->fetch();
				$rs['biensoxe'] =  $rs_xe['biensoxe'];
				$rs['stt'] =  $stt;
				//xử lý tên đơn vị
				$donvi = $model->db->query("SELECT * FROM php_donvi_suachua WHERE id=" . $rs['id_donvisuachua'] . " LIMIT 1");
				$rs_donvi = $donvi->fetch();
				
				 $rs['ten_donvi'] =  $rs_donvi['ten_donvi'];
				 //xu lý active

				if($rs['active'] == 0){
					$rs['active'] = ' class="active-account-die"';
					$rs['edit_delete'] = ' ';
				}
				else if($rs['active'] == 1){
					$rs['active'] = ' class="active-account"';
					$rs['edit_delete'] = ' remove';
				}
				if($rs['reset'] == 0){
					$rs['reset'] = ' class="active-account-die"';
				
				}
				else if($rs['reset'] == 1){
					$rs['reset'] = ' class="active-account"';
				
				}
				//tổng tiền trong tháng
				$rs2['tong_tien_thang'] +=$rs['tong_tien'];
				
				$rs['tong_tien'] = number_format($rs['tong_tien'], 0, ',', '.') . "";
			
				$stt++;
			// 
			
			$tpl->assign($rs,'detail');
			
			
		}
		$rs2['tong_tien_thang'] = number_format($rs2['tong_tien_thang'], 0, ',', '.') . "";
		$tpl->merge($rs2,'thang_nam');
}


$meta = array();
$meta['title'] = 'Theo dõi thay lốp';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');






