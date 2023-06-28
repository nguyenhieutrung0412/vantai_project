<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);
	
	$result = $oClass->get($request['id']);
	$user = $result->fetch();
	if(!$user['is_admin']){
		$oClass->active($request['id']);
		clear_sql_cache();
	}
	// refresh
	$query_string = $_SERVER['QUERY_STRING'];
	parse_str($query_string,$result);
	unset($result['act']);
	if($user['is_admin']) $result['msg'] = 'You cannot update status for this user';
	$hook->redirect('?'.http_build_query($result,NULL,'&'));
?>