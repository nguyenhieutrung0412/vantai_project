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
	'tpl_body'=>'khachhang.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));
if($_GET['name'] =='' && !isset($_GET['phone']) )
{

//Phân trang
$khach_hang = $oContent->view_table('php_khachhang');
//lấy tổng số phần tử tin 
$total = $khach_hang->num_rows();

$limit = 20;
$start = $limit*intval($_GET['page']);
$url = $system->root_dir.'khachhang';
$dp = new paging($url,$total,$limit);
$dp->current = '<a class="active_page">%d</a>';
$tpl->assign(array('divpage'=>$dp->simple(10)));


$khach_hang = $oContent->view_pagination('php_khachhang',1,$start,$limit);

while($rs = $khach_hang->fetch()){
	
	$rs['id_security'] = $oClass->id_encode($rs['id']);
	//kiểm tra có bảng giá hợp đồng hay không?
	$hopdong = $model->db->query('SELECT * FROM php_banggia_hopdong WHERE id_khachhang ='. $rs['id']);
	$total_hopdong = $hopdong->num_rows();
	if($total_hopdong == 0)
	{
		$rs['text_hopdong'] = '<i class="fa fa-plus"></i> Thêm';
	}
	else{
		$rs['text_hopdong'] = '<i class="fa fa-eye"></i> Xem';
	}
	//end
	$tpl->assign($rs,'detail');
	
	
}
}
else{
	if($_GET['name'] !='')
	{
		
		 $where .= " AND name_kh LIKE '%".$_GET['name']."%'";
	}
	if($_GET['phone'] !='')
	{
		$where .= " AND phone_kh LIKE '%".$_GET['phone']."%'";
	}

		//Phân trang
	$khach_hang = $oContent->view_table('php_khachhang');
	//lấy tổng số phần tử tin 
	$total = $khach_hang->num_rows();

	$limit = 20;
	$start = $limit*intval($_GET['page']);
	$url = $system->root_dir.'khachhang';
	$dp = new paging($url,$total,$limit);
	$dp->current = '<a class="active_page">%d</a>';
	$tpl->assign(array('divpage'=>$dp->simple(10)));


	$khach_hang = $oContent->view_pagination('php_khachhang','active = 1'.$where,$start,$limit);

	while($rs = $khach_hang->fetch()){
		//kiểm tra có bảng giá hợp đồng hay không?
	$hopdong = $model->db->query('SELECT * FROM php_banggia_hopdong WHERE id_khachhang ='. $rs['id']);
	$total_hopdong = $hopdong->num_rows();
	if($total_hopdong == 0)
	{
		$rs['text_hopdong'] = '<i class="fa fa-plus"></i> Thêm';
	}
	else{
		$rs['text_hopdong'] = '<i class="fa fa-eye"></i> Xem';
	}
	//end
		$rs['id_security'] = $oClass->id_encode($rs['id']);
		$tpl->assign($rs,'detail');
		
		
	}
}


$meta = array();
$meta['title'] = 'Quản lí khách hàng';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');





