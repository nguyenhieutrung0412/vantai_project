<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

if(!isset($_SESSION['user_id']) && !isset($_SESSION['position'])){
	header("Location: ".$domain);
	exit;
}

$tpl->setfile(array(
	'tpl_meta'=>'tpl_meta.tpl',
	'tpl_header'=>'tpl_header.tpl',
	'tpl_navbar'=>'tpl_navbar.tpl',
	'tpl_body'=>'home.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));

//lùi 1 tháng
// Lấy ngày hiện tại
$today = date('Y-m-d');
// trừ thêm 1 tháng
$month = strtotime(date("Y-m-d", strtotime($today)) . " -1 month");
$month = strftime("%Y-%m-%d", $month);

//xử lý lấy tháng năm 
$month_year = explode("-",$month);

$thang_prev['thang_prev'] = $month_year[1] .'-'.$month_year[0];
$thang_prev['nam'] = date('Y');
$tpl->merge($thang_prev,'thang_prev');

$khachhang = $oContent->view_table('php_khachhang',);
$i = 0;
while($rs_khachhang = $khachhang->fetch()){
	
	if($i >= 5)
	{
		break;
	}
	//xử lý đếm số lượng đơn hàng trọn gói của khách tháng trước tháng hiện tại
	$donhang_trongoi = $model->db->query("SELECT * FROM php_donhangtrongoi WHERE id_khachhang = ".$rs_khachhang['id'] ." AND thang = ".$month_year[1] ." AND nam = ".date("Y"));
	$count_donhangtrongoi =  $donhang_trongoi->num_rows();
	//xử lý đếm số lượng đơn hàng rời của khách tháng trước tháng hiện tại
	$donhang_roi = $model->db->query("SELECT * FROM php_donhangroi_s WHERE id_khachhang = ".$rs_khachhang['id'] ." AND thang = ".$month_year[1]  ." AND nam = ".date("Y") );
	$count_donhangroi =  $donhang_roi->num_rows();

	$tong_donhangthang = $count_donhangtrongoi + $count_donhangroi;
	$rs_khachhang['count_donhangtrongoi'] = $count_donhangtrongoi;
	$rs_khachhang['count_donhangroi'] = $count_donhangroi;
	$rs_khachhang['tong_donhangthang'] = $tong_donhangthang;

	$i++;
	$tpl->assign($rs_khachhang,'khachhang');

}
//rsort($rs_khachhang);
// $nhansu = $oContent->view_table('php_taixe','ORDER BY sanluong DESC');
// while($rs_nhansu = $nhansu->fetch()){
// 	$tpl->assign($rs_nhansu,'nhansu');
// }

$nhansu = $oContent->view_table('php_doixe');
$total['nhansu'] = $nhansu->num_rows();

$doixe = $oContent->view_table('php_doixe');
$total['doixe'] = $doixe->num_rows();

$doixe = $oContent->view_table('php_taixe');
$total['taixe'] = $doixe->num_rows();
$donhang = $oContent->view_table('php_donhangtrongoi');
$total['donhangtrongoi'] = $donhang->num_rows();
$donhangtrongoi =$donhang->num_rows();
$donhangroi = $oContent->view_table('php_donhangroi');

$total['donhangroi'] = $donhangroi->num_rows();
$tong_roi =$donhangroi->num_rows();
$total['donhang'] = $donhangtrongoi + $tong_roi;


$tpl->merge($total,'total');
//lịch xe
//cong ngay
$date = date('Y-m-d');
$newdate = strtotime ( '+7 day' , strtotime ( $date ) ) ;
 $newdate = date ( 'Y-m-d' , $newdate ); 
//end
$ngay['ngayhientai'] = $date;
$ngay['ngaycongbay'] = $newdate;
$where_from_to = " AND thoigian_giaohang BETWEEN '".$date."' AND '".$newdate."'";

$loai_chi = $oContent->view_table('php_donhangtrongoi',"active = 0 ".$where_from_to,$start,$limit);

$stt = 1;

while($rs = $loai_chi->fetch()){
	
	//$rs['id_security'] = $oClass->id_encode($rs['id']);
	//xu lý active

	
	$rs['loai_don'] = 'Đơn hàng trọn gói';
	$taixe = $model->db->query("SELECT * FROM php_taixe WHERE id = ". $rs['id_taixe'] );
	$rs_taixe = $taixe->fetch();
	$rs['name_taixe'] = $rs_taixe['name_taixe'];

	$doixe = $model->db->query("SELECT * FROM php_doixe WHERE id = ". $rs['id_doixe'] );
			$rs_doixe = $doixe->fetch();
			$rs['biensoxe'] = $rs_doixe['biensoxe'];
	

	// format tien te
	$rs['stt'] = $stt;
	//xử lý tên tài xế
	$tpl->assign($rs,'detail');
	$stt++;
	
}
$donhangroi = $oContent->view_table('php_donhangroi',"active = 0 ".$where_from_to,$start,$limit);


while($rs_donhangroi = $donhangroi->fetch()){
	
	//$rs['id_security'] = $oClass->id_encode($rs['id']);
	//xu lý active
	$rs_donhangroi['loai_don'] = 'Đơn hàng rời';
	
	$taixe = $model->db->query("SELECT * FROM php_taixe WHERE id = ". $rs_donhangroi['id_taixe'] );
	$rs_taixe = $taixe->fetch();
	$rs_donhangroi['name_taixe'] = $rs_taixe['name_taixe'];
	// format tien te
	$doixe = $model->db->query("SELECT * FROM php_doixe WHERE id = ". $rs_donhangroi['id_doixe'] );
	$rs_doixe = $doixe->fetch();
	$rs_donhangroi['biensoxe'] = $rs_doixe['biensoxe'];
	$rs_donhangroi['stt'] = $stt;
	$tpl->assign($rs_donhangroi,'detail');
	$stt++;
}

$tpl->merge($ngay, 'ngay');
//end



$meta = array();
$meta['title'] = 'Dashboard';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');

