<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);
if($system->params[0]){
	
	//lấy category
	$rs_cat = $oCategory->view(-1,-1,'ln.name_seo = "'.addslashes($system->params[0]).'"',0,1);
	$total_cat = $rs_cat->num_rows();
	$detail_cat = $rs_cat->fetch();
	
	//lấy cấp content khác type: 1,2,3,8
	$rs_content = $oContent->view(-1,"ln.name_seo = '".addslashes($system->params[0])."'",0,1);
	$total_content = $rs_content->num_rows();
	$detail = $rs_content->fetch();
	
	if($total_cat==0 || $total_content==0){
		header("Location: ".$domain,true,301);
		exit();
	}
	
	$tpl->merge($detail,'detail');
}