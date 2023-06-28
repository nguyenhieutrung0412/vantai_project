<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

$oClass = new ClassModel;
$breadcrumb = new breadcrumb;
extract($_GET);
$request = $_GET;
$request['type'] = intval($type);
$request['parentid'] = intval($parentid);
$request['query_string'] = '?'.$_SERVER['QUERY_STRING'];
$request['http_referer'] = $_SERVER['HTTP_REFERER'];


?>