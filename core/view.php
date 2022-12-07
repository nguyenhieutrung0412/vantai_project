<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

class View extends bTemplate{
	var $gzip = false;
	function __construct($tpl_dir,$lang){
		parent::__construct($tpl_dir);
		$this->aLang = $lang;
		
	}
	function display(){
		header('Content-Type: text/html;charset=UTF-8');
		$html =  $this->parse();
		if($this->gzip){
			$encoding = explode(',',$_SERVER["HTTP_ACCEPT_ENCODING"]);
			if(in_array('deflate',$encoding)){
				header('Content-Encoding: deflate');
				$html =  gzdeflate($html,9);
			}
		}
		return $html;
	}
	
	
	
	
}
?>