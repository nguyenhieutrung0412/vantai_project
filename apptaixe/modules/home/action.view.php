<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);
if(isset($_SESSION['id_taixe'])){
	header("Location: ".$domain.'trangchu');
	exit;
}
$tpl->setfile(array(

	'tpl_body'=>'home.tpl',

));



$meta = array();
$meta['title'] = $html['mtitle'];
$meta['keyword'] = $html['mkey'];
$meta['desc'] = $html['mdesc'];
$meta['icon'] = 'data/upload/cover.jpg';
$tpl->merge($meta,'meta');

$tpl->merge($html,'detail');