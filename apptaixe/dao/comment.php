<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

class CommentDAO extends Model{
	function __construct(){
		parent::__construct();
	}
	
	
	function get($page,$pageid){
		return $this->db->query("SELECT c.* FROM ".$this->prefix."comment c
		WHERE c.`module`='$page' AND c.pageid=".intval($pageid)." ORDER BY `timestamp` DESC");
	}


}

?>