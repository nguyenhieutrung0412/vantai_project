<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

class OptionDAO extends Model{
	var $configure_mod;
	function __construct($configure_mod){
		parent::__construct();
		$this->configure_mod = $configure_mod;
	}
	
	function get($id=0){
		$info = $this->info($id);
		
		$result =  $this->query("SELECT c.*,ln.* FROM ".$this->prefix."html c, ".$this->prefix."html_ln ln WHERE c.id = ln.id AND ln.ln = '".$this->setLang('options',$info['type'],$this->configure_mod)."' AND c.id = ".intval($id));
		$data = $result->fetch();
		$result->cache();
		return $data;
	}
	
	
	function info($id = 0){
		$result =  $this->query("SELECT c.* FROM ".$this->prefix."html c WHERE c.id = ".intval($id));
		$data = $result->fetch();
		$result->cache();
		return $data;
	}
	
	
	function view($type = 0,$orderby = NULL){
		if(!$orderby) $orderby = $this->configure_mod['options'][$type]['sort_order'];
		$sql_order = $orderby?" ORDER BY $orderby":"";
		$result =  $this->query("SELECT c.*,ln.* FROM ".$this->prefix."options c, ".$this->prefix."options_ln ln WHERE c.id = ln.id AND ln.ln = '".$this->setLang('options',$type,$this->configure_mod)."' $sql_order");
		return $result;
	}
	
	//select from data option
	function content($type = 0,$options_id = 0){
		$result =  $this->query("SELECT c.* FROM ".$this->prefix."content_options c WHERE options_id = ".intval($options_id));
		return $result;
	}
	

}

?>