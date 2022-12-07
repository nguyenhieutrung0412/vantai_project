<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);
//$model = new Model;
//$model->setCache('data/cache/');

//lấy url gôn ngữ theo cấp thư mục (modules)		
$result = $model->db->query("SELECT c.`module`,ln.* FROM ".$model->prefix."module c,".$model->prefix."module_ln ln WHERE c.id = ln.id AND c.active = 1");
while($rs = $result->fetch()){
	
	$controller->modules['main'][$rs['module_name']] = $rs;
	$controller->modules['data'][$rs['module']][$rs['ln']] = $rs;
	$controller->modules[$rs['ln']]['module'][$rs['module']] = $rs['module_name'];
	$controller->modules[$rs['ln']]['name'][$rs['module']] = $rs['name'];
	$tmp = $controller->params;
	$tmp[0] = $rs['module_name'];
	$controller->modules['url'][$rs['module']][$rs['ln']] = count($tmp)?rtrim(implode('/',$tmp),'/'):'';
}

//lấy url giựt cấp ngôn ngữ theo cấp category
$langURL = new modelController;
$langID = $langURL->getCateLang($this->params[0])['id'];
$langCode = $langURL->getCateLang($this->params[0])['ln'];
$langName = $langURL->getCateLang($this->params[0])['name'];
$langURL = $langURL->getCateLang($this->params[0])['name_seo'];

if($langCode != ''){
	$arr = array(
		'module' => 'detail',
		'id' => $langID,
		'ln' => $langCode,
		'name' => $langName,
		'module_name' => $langURL,
		'web_title' =>  '',
		'web_keyword' =>  '',
		'web_desc' =>  '',
		'meta_extra' =>  ''
	);
	
	$controller->modules['main'][$arr['module_name']] = $arr;
	$controller->modules['data'][$arr['module']][$arr['ln']] = $arr;
	$controller->modules[$arr['ln']]['module'][$arr['module']] = $arr['module_name'];
	$controller->modules[$arr['ln']]['name'][$arr['module']] = $arr['name'];
	$tmp = $controller->params;
	$tmp[0] = $arr['module_name'];
	$controller->modules['url'][$arr['module']][$arr['ln']] = count($tmp)?rtrim(implode('/',$tmp),'/'):'';
	
	//lấy danh sách ngôn ngữ khác không thuộc ngôn ngữ hiện tại
	$kt = $model->db->query("SELECT * FROM php_category_ln WHERE id = '".$langID."' AND ln != '".$langCode."'");
	while($fetch_ln = $kt->fetch()){

		$arr = array(
			'module' => 'detail',
			'id' => $langID,
			'ln' => $fetch_ln['ln'],
			'name' => $fetch_ln['name'],
			'module_name' => $fetch_ln['name_seo'],
			'web_title' =>  '',
			'web_keyword' =>  '',
			'web_desc' =>  '',
			'meta_extra' =>  ''
		);
		
		$controller->modules['main'][$arr['module_name']] = $arr;
		$controller->modules['data'][$arr['module']][$arr['ln']] = $arr;
		$controller->modules[$arr['ln']]['module'][$arr['module']] = $arr['module_name'];
		$controller->modules[$arr['ln']]['name'][$arr['module']] = $arr['name'];
		$tmp = $controller->params;
		$tmp[0] = $arr['module_name'];
		$controller->modules['url'][$arr['module']][$arr['ln']] = count($tmp)?rtrim(implode('/',$tmp),'/'):'';
		
	}
}


//lấy url ngôn ngữ theo cấp content
$langURL_content = new modelController;
$langID_content = $langURL_content->getContentLang($this->params[0])['id'];
$langCode_content = $langURL_content->getContentLang($this->params[0])['ln'];
$langName_content = $langURL_content->getContentLang($this->params[0])['name'];
$langURL_content = $langURL_content->getContentLang($this->params[0])['name_seo'];

if($langCode_content != ''){
	$arr = array(
		'module' => 'detail',
		'id' => $langID_content,
		'ln' => $langCode_content,
		'name' => $langName_content,
		'module_name' => $langURL_content,
		'web_title' =>  '',
		'web_keyword' =>  '',
		'web_desc' =>  '',
		'meta_extra' =>  ''
	);
	
	$controller->modules['main'][$arr['module_name']] = $arr;
	$controller->modules['data'][$arr['module']][$arr['ln']] = $arr;
	$controller->modules[$arr['ln']]['module'][$arr['module']] = $arr['module_name'];
	$controller->modules[$arr['ln']]['name'][$arr['module']] = $arr['name'];
	$tmp = $controller->params;
	$tmp[0] = $arr['module_name'];
	$controller->modules['url'][$arr['module']][$arr['ln']] = count($tmp)?rtrim(implode('/',$tmp),'/'):'';
	
	//lấy danh sách ngôn ngữ khác không thuộc ngôn ngữ hiện tại
	$kt = $model->db->query("SELECT * FROM php_content_ln WHERE id = '".$langID_content."' AND ln != '".$langCode_content."'");
	while($fetch_ln = $kt->fetch()){

		$arr = array(
			'module' => 'detail',
			'id' => $langID_content,
			'ln' => $fetch_ln['ln'],
			'name' => $fetch_ln['name'],
			'module_name' => $fetch_ln['name_seo'],
			'web_title' =>  '',
			'web_keyword' =>  '',
			'web_desc' =>  '',
			'meta_extra' =>  ''
		);
		
		$controller->modules['main'][$arr['module_name']] = $arr;
		$controller->modules['data'][$arr['module']][$arr['ln']] = $arr;
		$controller->modules[$arr['ln']]['module'][$arr['module']] = $arr['module_name'];
		$controller->modules[$arr['ln']]['name'][$arr['module']] = $arr['name'];
		$tmp = $controller->params;
		$tmp[0] = $arr['module_name'];
		$controller->modules['url'][$arr['module']][$arr['ln']] = count($tmp)?rtrim(implode('/',$tmp),'/'):'';
	}
}

$result->cache();

if($controller->modules['main'][$controller->module]['ln']) $controller->lang = $controller->modules['main'][$controller->module]['ln'];

if(!$controller->params[0]){
	$result = $model->db->query("SELECT `ln` FROM ".$model->prefix."language WHERE `is_default` = 1");
	$data = $result->fetch();
	$controller->lang = $data['ln'];
	$result->cache();
}

if($controller->modules['main'][$controller->module]['module']) $controller->module = $controller->modules['main'][$controller->module]['module'];