<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

/*
// list functions can hook ( functions were defined in core/hooks.php)
	function web_header() // load first
	function web_footer() // load last
	function redirect($url = NULL)
	function dateformat($date = NULL,$format = 'd/m/Y')
	function encrypt($string) // current we are  using md5
*/

function format($array = NULL){
	if(is_array($array)){
		foreach($array as $k=>$v){
			$v = stripslashes($v);
			$v = str_replace(array('../plugins','../'._UPLOAD),array('plugins',_UPLOAD),$v);
			
			$array[$k] = $v;
		}
		if(!$array['web_keyword']) unset($array['web_keyword']);
		if(!$array['web_desc']) unset($array['web_desc']);
	}
	return $array;
}

?>