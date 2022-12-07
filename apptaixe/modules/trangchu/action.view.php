<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);
if(!isset($_SESSION['id_taixe']) && !isset($_SESSION['name_taixe']) && $_SESSION['active'] == 0){
	header("Location: ".$domain);
	exit;
}
$tpl->setfile(array(
	'tpl_meta'=>'tpl_meta.tpl',
	'tpl_header'=>'tpl_header.tpl',
	'tpl_body'=>'trangchu.tpl',
	'tpl_footer'=>'tpl_footer.tpl',
));
//lấy đơn hàng trọn gói
$donhangtrongoi = $oContent->view_table('php_donhangtrongoi','id_taixe = '.$_SESSION['id_taixe']);
$count =$donhangtrongoi->num_rows();

if($count > 0)
{
	while($rs = $donhangtrongoi->fetch())
	{
		
			$tpl->assign($rs,'donhangtrongoi');
	}
}
//lấy đơn hàng rời
$donhangroi = $oContent->view_table('php_donhangroi','id_taixe = '.$_SESSION['id_taixe']);
$count_donhangroi =$donhangroi->num_rows();

if($count_donhangroi > 0)
{
	while($rs_donhangroi = $donhangroi->fetch())
	{
		$donhangroi_s = $model->db->query("SELECT * FROM php_donhangroi_s WHERE id_donhangroi =".$rs_donhangroi['id']);
		$rs_donhangroi['soluong_donhangcon'] = $donhangroi_s->num_rows();
			$tpl->assign($rs_donhangroi,'donhangroi');
	}
}


$meta = array();
$meta['title'] = $html['mtitle'];
$meta['keyword'] = $html['mkey'];
$meta['desc'] = $html['mdesc'];
$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');

$tpl->merge($html,'detail');