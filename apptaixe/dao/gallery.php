<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

class GalleryDAO extends Model{
	function __construct(){
		parent::__construct();
	}
	

	function get($page,$pageid){
		return $this->db->query("SELECT * FROM ".$this->prefix."gallery WHERE page='".addslashes($page)."' AND pageid=".intval($pageid)." ORDER BY order_id,id");
	}
	
	function insert($page,$pageid,$data = array()){
		$data['page'] = $page;
		$data['pageid'] = intval($pageid);
		return $this->db->insert($this->prefix.'gallery',$data);
	}
	function update($id,$data){
		return $this->db->update($this->prefix.'gallery',$data," id = ".intval($id));
	}
	
	function delete($id){
		$result = $this->db->query("SELECT * FROM ".$this->prefix."gallery WHERE id = ".intval($id));
		if($cat = $result->fetch()){
			$this->db->delete($this->prefix."gallery","id = ".intval($id));
			@unlink(_UPLOAD.$cat['icon']);
			@unlink(_UPLOAD.$cat['image']);
			@unlink(_UPLOAD.'thumb/'.$cat['image']);
			@unlink(_UPLOAD.'orginal/'.$cat['icon']);
			@unlink(_UPLOAD.'orginal/'.$cat['image']);
		}
	}
	
	function active($id){
		return $this->db->query("UPDATE ".$this->prefix."gallery SET `active` = ABS(`active` - 1) WHERE `id` = ".intval($id));
	}
	

}

?>