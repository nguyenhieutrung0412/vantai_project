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
		return $this->db->query("SELECT * FROM ".$this->prefix."member WHERE $cond ORDER BY id DESC");
	}
	function gethtml($id=0){
		
		$result =  $this->db->query("SELECT c.*,ln.* FROM ".$this->prefix."html c, ".$this->prefix."html_ln ln WHERE c.id = ln.id AND c.id = ".intval($id));
		$data  = $result->fetch();
		return $data;
	}
	function get($id){
		return $this->db->query("SELECT * FROM ".$this->prefix."member  WHERE id = ".intval($id));
	}
	function getmember($cond = 1){
		$result = $this->db->query("SELECT mb.hoten,mb.diachi,mb.didong,mb.email,hd.ngaydathang FROM ".$this->prefix."hoadon hd,".$this->prefix."member mb  WHERE $cond ");
		$data =  $result->fetch();
		return $data;
	}
	function getnguoinhan($cond = 1){
		$result = $this->db->query("SELECT * FROM ".$this->prefix."hoadon WHERE $cond ");
		$data =  $result->fetch();
		return $data;
	}
	function getchitiet($cond = 1){
		return $this->db->query("SELECT * FROM ".$this->prefix."hoadon hd, ".$this->prefix."chitiethoadon ct WHERE $cond ");
	}
	
	function insert($data){
		return $this->db->insert($this->prefix."member",$data);
	}
	
	function update($id,$data){
		$this->db->update($this->prefix."member",$data," id = ".intval($id));
	}
	
	function delete($id){
		$this->db->delete($this->prefix."member"," id = ".intval($id));
	}
	
	function active($id){
		$this->db->query("UPDATE ".$this->prefix."member SET `active` = ABS(`active` - 1) WHERE id = ".intval($id));
	}
	
}
?>