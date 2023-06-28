<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

class ClassModel extends Model{
	function __construct(){
		parent::__construct();
	}
	
	function view($cond = 1){
		return $this->db->query("SELECT * FROM ".$this->prefix."taixe WHERE $cond ORDER BY id");
	}
	
	function get($id){
		return $this->db->query("SELECT * FROM ".$this->prefix."taixe WHERE id = ".intval($id));
	}
	
	function insert($data){
		return $this->db->insert($this->prefix."taixe",$data);
	}
	
	function update($id,$data){
		$this->db->update($this->prefix."taixe",$data," id = ".intval($id));
	}
	
	function delete($id){
		$this->db->delete($this->prefix."taixe"," id = ".intval($id));
	}
	
	function active($id){
		$this->db->query("UPDATE ".$this->prefix."taixe SET `active` = ABS(`active` - 1) WHERE id = ".intval($id));
	}
	
}
?>