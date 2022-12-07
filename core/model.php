<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);
class Model extends CaoBox{
	var $prefix;
	var $lang;
	var $db;
	function __construct(){
		$this->db = new DB($GLOBALS['cfg']['server'],$GLOBALS['cfg']['port'],$GLOBALS['cfg']['usr'],$GLOBALS['cfg']['psw'],$GLOBALS['cfg']['name']);
		$this->lang = $GLOBALS['controller']->lang;
		$this->prefix = $GLOBALS['cfg']['prefix'];
		//$this->db->cache = _ROOT.'data/cache/';
	}
	
	function setCache($dircache){
		$this->db->cache = $dircache;
	}
	
	function query($sql){
		$db = new DB($GLOBALS['cfg']['server'],$GLOBALS['cfg']['port'],$GLOBALS['cfg']['usr'],$GLOBALS['cfg']['psw'],$GLOBALS['cfg']['name']);
		$db->cache = $this->db->cache;
		return $db->query($sql);
	}
	
	function setLang($module = 0,$typeid = 0,$configure_mod){
		if($configure_mod[$module][$typeid]['languages']) return $configure_mod['default_lang'];
		return $this->lang;
	}
	
	
	function setCharset($charset = "UTF8"){
		$this->query("SET NAMES '$charset'");
	}
}
?>