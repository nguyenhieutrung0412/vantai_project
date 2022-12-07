<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

class LanguageDAO extends Model{
	function __construct(){
		parent::__construct();
	}
	function view($cond = 1){
		return $this->db->query("SELECT * FROM ".$this->prefix."language WHERE $cond ORDER BY is_default DESC");
	}


}

?>