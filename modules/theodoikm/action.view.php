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
	'tpl_body'=>'theodoikm.tpl',
	'tpl_footer'=>'tpl_footer.tpl',

));



//Phân trang
$sokm = $oContent->view_table('php_theodoithaylop');
//lấy tổng số phần tử tin 
$total = $sokm->num_rows();



$stt = 1;
while($rs = $sokm->fetch()){
	
	$rs['id_security'] = $oClass->id_encode($rs['id']);
	$rs['id_security_doixe'] = $oClass->id_encode($rs['id_doixe']);
	//xu lý active
	//lấy thông tin xe
	$xe = $model->db->query("SELECT * FROM php_doixe WHERE id=" . $rs['id_doixe'] . " LIMIT 1");
	$rs_xe = $xe->fetch();
	$rs['biensoxe'] =  $rs_xe['biensoxe'];
	
	if($rs['km_tukhithaynhot'] == '')
	{
		$rs['km_tukhithaynhot'] = 0;
	}
	
	if($rs['km_tukhithaynhot'] > $master['km_dinhmucthaynhot'])
	{
		$rs['color_nhot'] = ' color-0';
	}
	else{
		$rs['color_nhot'] = ' green';
	}
	if($rs['1p1'] > $master['km_dinhmucthaylop'])
	{
		$rs['color_1p1'] = ' color-0';
	}
	else{
		$rs['color_1p1'] = ' green';
	}
	if($rs['1t1'] > $master['km_dinhmucthaylop'])
	{
		$rs['color_1t1'] = ' color-0';
	}
	else{
		$rs['color_1t1'] = ' green';
	}
	if($rs['2p1'] > $master['km_dinhmucthaylop'])
	{
		$rs['color_2p1'] = ' color-0';
	}
	else{
		$rs['color_2p1'] = ' green';
	}
	if($rs['2t1'] > $master['km_dinhmucthaylop'])
	{
		$rs['color_2t1'] = ' color-0';
	}
	else{
		$rs['color_2t1'] = ' green';
	}
	if($rs['3p1'] > $master['km_dinhmucthaylop'])
	{
		$rs['color_3p1'] = ' color-0';
	}
	else{
		$rs['color_3p1'] = ' green';
	}
	if($rs['3p2'] > $master['km_dinhmucthaylop'])
	{
		$rs['color_3p2'] = ' color-0';
	}
	else{
		$rs['color_3p2'] = ' green';
	}
	if($rs['3t1'] > $master['km_dinhmucthaylop'])
	{
		$rs['color_3t1'] = ' color-0';
	}
	else{
		$rs['color_3t1'] = ' green';
	}
	if($rs['3t2'] > $master['km_dinhmucthaylop'])
	{
		$rs['color_3t2'] = ' color-0';
	}
	else{
		$rs['color_3t2'] = ' green';
	}
	if($rs['4p1'] > $master['km_dinhmucthaylop'])
	{
		$rs['color_4p1'] = ' color-0';
	}
	else{
		$rs['color_4p1'] = ' green';
	}
	if($rs['4p2'] > $master['km_dinhmucthaylop'])
	{
		$rs['color_4p2'] = ' color-0';
	}
	else{
		$rs['color_4p2'] = ' green';
	}
	if($rs['4t1'] > $master['km_dinhmucthaylop'])
	{
		$rs['color_4t1'] = ' color-0';
	}
	else{
		$rs['color_4t1'] = ' green';
	}
	if($rs['4t2'] > $master['km_dinhmucthaylop'])
	{
		$rs['color_4t2'] = ' color-0';
	}
	else{
		$rs['color_4t2'] = ' green';
	}

	

	//xử lý km nhớt và lốp còn lại
	$rs['km_nhotconlai'] = $master['km_dinhmucthaynhot'] - $rs['km_tukhithaynhot'];
	$rs['km_1p1conlai'] = $master['km_dinhmucthaylop'] - $rs['1p1'];
	$rs['km_1t1conlai'] = $master['km_dinhmucthaylop'] - $rs['1t1'];
	$rs['km_2p1conlai'] = $master['km_dinhmucthaylop'] - $rs['2p1'];
	$rs['km_2t1conlai'] = $master['km_dinhmucthaylop'] - $rs['2t1'];
	$rs['km_3p1conlai'] = $master['km_dinhmucthaylop'] - $rs['3p1'];
	$rs['km_3p2conlai'] = $master['km_dinhmucthaylop'] - $rs['3p2'];
	$rs['km_3t1conlai'] = $master['km_dinhmucthaylop'] - $rs['3t1'];
	$rs['km_3t2conlai'] = $master['km_dinhmucthaylop'] - $rs['3t2'];
	$rs['km_4p1conlai'] = $master['km_dinhmucthaylop'] - $rs['4p1'];
	$rs['km_4p2conlai'] = $master['km_dinhmucthaylop'] - $rs['4p2'];
	$rs['km_4t1conlai'] = $master['km_dinhmucthaylop'] - $rs['4t1'];
	$rs['km_4t2conlai'] = $master['km_dinhmucthaylop'] - $rs['4t2'];

	//end
	$rs['stt'] = $stt;
	//xử lý tên tài xế
	$tpl->assign($rs,'detail');
	$stt++;
	
}


$tpl->merge($ngay, 'ngay');

$meta = array();
$meta['title'] = 'Theo dõi km của xe';

$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');






