<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);


function ajax_permission(){
	$headers = getallheaders();
	if((!$headers['X-Requested-With']&&!$headers['x-requested-with']) || ($headers['X-Requested-With']&&$headers['X-Requested-With']!='XMLHttpRequest') // Firefox
		|| ($headers['x-requested-with']&&$headers['x-requested-with']!='XMLHttpRequest') // IE
	) return false;
	return true;
}


function cookie($name,$value=NULL,$time=NULL,$path=NULL,$domain=NULL){
	setcookie($name,$value,$time?$time:time()+24*3600,'/~phpbasic/v02/','112.213.88.177');
}

function return_link($url,$ssl = false){
	return 'http'.($ssl?'s':'').'://'.str_replace(array('http://','https://'),array('',''),$url);
}

function str_to_url($string = NULL){
	if(!$string) return NULL;
	$string = str_replace(array(' ','_'),array('-','-'),$string);
	return urlencode($string);
}
function format_div($string = NULL,$p = 0,$url = '%d',$params = NULL){
	if(!$string) return $string;
	$string = stripslashes($string);
	$tmp = explode('<!-- pagebreak -->',$string);
	$format = array('num'=>count($tmp));
	$format['divcontent'] = '';
	for($i=1;$i<=$format['num'];$i++){
		if($i==1) $format['divcontent'] .= ' <a href="'.$url.'">'.$i.'</a> ';
		else $format['divcontent'] .= ' <a href="'.rtrim($url,'/').'/?p='.($i-1).'">'.$i.'</a> ';
	}
	if($p>= 0 && $p < $format['num']) $format['content'] =  $tmp[$p];
	else $format['content'] =  $tmp[0];
	return $format;
}



?>