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
	function module_before() //load before module run
	function module_after() // load after modul run
	function url($arr_parametters = NULL)
	function redirect($url = NULL)
	function dateformat($date = NULL,$format = 'd/m/Y')
	function output($string = NULL,$html  = 1)
	function encrypt($string) // current we are  using md5
	function cookie($name,$value,$path,$domain)
*/

function redirect($url = NULL){
	if(!$url) return false;
	header('location: '.$url);
	exit();
}
?>