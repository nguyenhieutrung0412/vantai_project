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
	'tpl_body'=>'lichxe.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));


//Phân trang
$loai_chi = $oContent->view_table('php_loaichi');
//lấy tổng số phần tử tin 
$total = $loai_chi->num_rows();

$limit = 10;
$start = $limit*intval($_GET['page']);
$url = $system->root_dir.'lichxe';
$dp = new paging($url,$total,$limit);
$dp->current = '<a class="active_page">%d</a>';
$tpl->assign(array('divpage'=>$dp->simple(10)));
//cong ngay
  $date = date('Y-m-d');
$newdate = strtotime ( '+7 day' , strtotime ( $date ) ) ;
   $newdate = date ( 'Y-m-d' , $newdate ); 
//end
// $ngayhientai =  date("Y-m-d");
// $arr = explode("-",$ngayhientai);
// $bayngaytoi = $arr[2] + 6;
// $ngaycongbay = $arr[0] .'-'.$arr[1].'-'. $bayngaytoi;
 $ngay['ngayhientai'] = $date;
 $ngay['ngaycongbay'] = $newdate;

$where_from_to = " AND thoigian_giaohang BETWEEN '".$date."' AND '".$newdate."'";

$loai_chi = $oContent->view_pagination('php_donhangtrongoi',"active = 0 ".$where_from_to,$start,$limit);

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
$donhangroi = $oContent->view_pagination('php_donhangroi',"active = 0 ".$where_from_to,$start,$limit);


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

$meta = array();
$meta['title'] = 'Lịch xe vận chuyển';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');






