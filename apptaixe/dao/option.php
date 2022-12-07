<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

class OptionDAO extends Model{
	function __construct(){
		parent::__construct();
	}
	
	function view($type=0){
		return $this->db->query("SELECT * FROM ".$this->prefix."options c,".$this->prefix."options_ln ln WHERE c.id = ln.id AND ln.ln = '".$this->lang."' AND c.type = ".intval($type));
	}
	

}

?>