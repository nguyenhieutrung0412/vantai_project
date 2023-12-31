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
	'tpl_body'=>'doixe.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));
if($_GET['loaixe'] =='' && $_GET['biensoxe'] =='')
{
//Phân trang
$doixe = $oContent->view_table('php_doixe');
//lấy tổng số phần tử tin 
$total = $doixe->num_rows();

$limit = 10;
$start = $limit*intval($_GET['page']);
$url = $system->root_dir.'doixe';
$dp = new paging($url,$total,$limit);
$dp->current = '<a class="active_page">%d</a>';
$tpl->assign(array('divpage'=>$dp->simple(10)));


$doixe = $oContent->view_pagination('php_doixe',1,$start,$limit);


while($rs = $doixe->fetch()){
	//Chuyển đổi ngày
	 $ngay_arr = explode("/",$rs['han_dang_kiem']);
	 $ngay_format = $ngay_arr[2].'-'.$ngay_arr[1].'-'.$ngay_arr[0];

	 $first_date = strtotime(date('Y-m-d'));
	$second_date = strtotime($ngay_format);
	$datediff = abs($first_date - $second_date);
	$rs['hdk_con_lai'] = floor($datediff / (60*60*24));
	if($rs['hdk_con_lai'] > 0)
	{
		$rs['class_hdk'] = ' style="color:#00bf15"' ;
	}
	else{
		$rs['class_hdk'] = ' style="color:#fe0000"' ;
	}
	//end
	
	$rs['id_security'] = $oClass->id_encode($rs['id']);
	//xu lý active

	if($rs['active'] == 0){
		$rs['active'] = ' class="active-account-die"';
	}
	else if($rs['active'] == 1){
		$rs['active'] = ' class="active-account"';
	}
	//Xu lý hiển thị tên tài xế
	 if($rs['id_taixe']!= 0){
		$tentaixe = $model->db->query("SELECT * FROM php_taixe WHERE id =".$rs['id_taixe']);
		while($rs_join = $tentaixe->fetch()){
		
			$rs['name_taixe'] = $rs_join['name_taixe'];
		}
	 }
	 $tpl->assign($rs,'detail');
	
}
}
else{
	if($_GET['loaixe'] !='')
	{
		
		 $where .= " AND loaixe LIKE '%".$_GET['loaixe']."%'";
	}
	if($_GET['biensoxe'] !='')
	{
		
		 $where .= " AND biensoxe LIKE '%".$_GET['biensoxe']."%'";
	}
	//Phân trang
	$doixe = $oContent->view_table('php_doixe');
	//lấy tổng số phần tử tin 
	$total = $doixe->num_rows();

	$limit = 10;
	$start = $limit*intval($_GET['page']);
	$url = $system->root_dir.'doixe';
	$dp = new paging($url,$total,$limit);
	$dp->current = '<a class="active_page">%d</a>';
	$tpl->assign(array('divpage'=>$dp->simple(10)));


	$doixe = $oContent->view_pagination('php_doixe','active < 5'.$where,$start,$limit);


	while($rs = $doixe->fetch()){
		
		$rs['id_security'] = $oClass->id_encode($rs['id']);
		//xu lý active

		if($rs['active'] == 0){
			$rs['active'] = ' class="active-account-die"';
		}
		else if($rs['active'] == 1){
			$rs['active'] = ' class="active-account"';
		}
		//Xu lý hiển thị tên tài xế
		if($rs['id_taixe']!= 0){
			$tentaixe = $model->db->query("SELECT * FROM php_taixe WHERE id =".$rs['id_taixe']);
			while($rs_join = $tentaixe->fetch()){
			
				$rs['name_taixe'] = $rs_join['name_taixe'];
			}
		}
		$tpl->assign($rs,'detail');
		
	}
}


//lấy danh sách tài xế



$list_txdacoxe = $oContent->view_table('php_doixe');
while($rs_taixe = $list_txdacoxe->fetch())
{
	$arr_id_taixephutrach[] = $rs_taixe['id_taixe'];
}

$list_tx = $oContent->view_table('php_taixe');
$list_tx = $hook->format($list_tx);
while($rs = $list_tx->fetch()){

	$id_secutity_first = rand(1111111,9999999);
	$id_secutity_last = rand(1111111,9999999);
	$rs['id_security_tx'] =$id_secutity_first . $rs['id'] .$id_secutity_last;

	if(in_array($rs['id'],$arr_id_taixephutrach) ){
		unset($rs);
	}


	$tpl->assign($rs,'list_tx');
}

$meta = array();
$meta['title'] = 'Quản lí đội xe';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');


