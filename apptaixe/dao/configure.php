<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

class ConfigureDAO extends Model{
	function __construct(){
		parent::__construct();
		
	}
	

	
	function getMod($cond  = 1){
		return $this->db->query("SELECT * FROM ".$this->prefix."configure_mod WHERE $cond ORDER BY `module`,typeid");
	}
	
	
	
	function view($cond = 1){
		return $this->db->query("SELECT * FROM ".$this->prefix."configure WHERE $cond ORDER BY is_system DESC");
	}
	
	
	function group($cond = 1){
		return $this->db->query("SELECT * FROM ".$this->prefix."configure_group WHERE `active` = 1 AND $cond ORDER BY order_id");
	}

}

?>