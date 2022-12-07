<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

class CategoryDAO extends Model{
	var $configure_mod = array();
	
	function __construct(){
		parent::__construct();
		$this->configure_mod = $configure_mod;
	}
	
	function view($type=0,$parentid = 0,$q = NULL,$cond1=1,$sorted_by = " cat.`order_id`"){
		$cond = "cat.type = ".intval($type);
		if($q) $cond .= " AND ln.name LIKE '%".addslashes($q)."%'";
		else $cond .= "  AND cat.parentid = ".intval($parentid);
		$order = "";
		if($sorted_by && $sorted_order) $order = ",$sorted_by $sorted_order";
		return $this->db->query("SELECT * FROM ".$this->prefix."category cat,".$this->prefix."category_ln ln WHERE cat.id = ln.id AND ln.ln = '".$this->lang."' AND $cond ORDER BY $sorted_by");
	}
	
	//hàm tùy biến
	function view_cat($type = 0,$parentid = -1,$cond = 1,$start = 0,$limit = 0,$orderby = NULL){
		if(!$orderby) $orderby = $this->configure_mod['content'][$type]['catsort_order'];
		$sql_order = $orderby?"ORDER BY $orderby":"";
		
		if($type>=0) $cond .=" AND c.type = ".intval($type);
		if($parentid>=0) $cond .= " AND c.parentid = ".intval($parentid);
		$sql = "SELECT * FROM ".$this->prefix."category c,".$this->prefix."category_ln ln WHERE c.id = ln.id AND ln.ln = '".$this->setLang('content',$type,$this->configure_mod)."' AND $cond $sql_order".($limit?" LIMIT $start,$limit":"");
		//echo $sql."<br />";
		return $this->query($sql);
	}
	
	
	function view_cat2($type = -1,$cond = 1,$start = 0,$limit = 0,$orderby = NULL){
		if(!$orderby) $orderby = $this->configure_mod['content'][$type]['catsort_order'];
		$sql_order = $orderby?"ORDER BY $orderby":"";
		
		$cond_type = 1;
		if(is_array($type)) $cond_type = "c.type IN (".implode(',',$type).")"; 
		elseif($type>=0) $cond_type = "c.type = ".intval($type);
		return $this->db->query("SELECT c.*,ln.* FROM ".$this->prefix."category c,".$this->prefix."category_ln ln WHERE c.active = 1 AND $cond_type AND c.id = ln.id AND ln.ln = '".$this->setLang('category',$type,$this->configure_mod)."' AND $cond $sql_order ".($limit?"LIMIT $start,$limit":""));
	}
	
	function xpath($id,$result = NULL){
		if(!$result) $result = array();
		$sql = $this->db->query("SELECT * FROM ".$this->prefix."category cat,".$this->prefix."category_ln ln WHERE cat.id = ln.id AND ln.ln = '".$this->lang."' AND cat.id = ".intval($id)." ORDER BY cat.id");
		$rs = $sql->fetch($sql);
		if($rs){
			$result[] = $rs;
			$result = $this->xpath($rs['parentid'],$result);
		}
		return $result;
	}
	
	function get($id,$cond=1){
		$info = $this->info($id);
		$result = $this->db->query("SELECT * FROM ".$this->prefix."category c,".$this->prefix."category_ln ln WHERE c.id = ln.id AND ln.ln = '".$this->setLang('content',$info['type'],$this->configure_mod)."' AND c.id = ".intval($id)." AND ".$cond);
		$data = $result->fetch();
		$result->cache();
		return $data;
	}
	function info($id){
		$result = $this->db->query("SELECT * FROM ".$this->prefix."category c WHERE c.id = ".intval($id));
		return $result->fetch();
	}
	
	function tree($type=0,$parentid=0,$space='-',$content = NULL,$array = NULL){
		if(!$array) $array = array();
		if($content) $result = $this->query("SELECT c.*,ln.* FROM ".$this->prefix."category c,".$this->prefix."category_ln ln WHERE c.id=ln.id AND ln.ln='".$this->lang."' AND c.type=".intval($type)." AND c.parentid = ".intval($parentid));
		else $result = $this->query("SELECT * FROM ".$this->prefix."category WHERE type=".intval($type)." AND parentid = ".intval($parentid));
		while($rs = $result->fetch()){
			$rs['prefix'] = $space;
			$array[] = $rs;
			$array = $this->tree($type,$rs['id'],$rs['prefix'].$space,$content,$array);
		}
		return $array;
	}

}