<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);
class HtmlDAO extends Model{
	var $configure_mod;
	function __construct($configure_mod){
		parent::__construct();
		$this->configure_mod = $configure_mod;
	}
	
	
	function get($id=0){
		$result =  $this->db->query("SELECT c.*,ln.* FROM ".$this->prefix."html c, ".$this->prefix."html_ln ln WHERE c.id = ln.id AND ln.ln = '".$this->setLang('html',$id,$this->configure_mod)."' AND c.id = ".intval($id));
		$data  = $result->fetch();
		$result->cache();
		return $data;
	}
	

}

?>