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
	function __construct($configure_mod){
		parent::__construct();
		$this->configure_mod = $configure_mod;
		
	}
	
	function view($type = 0,$parentid = -1,$cond = 1,$start = 0,$limit = 0,$orderby = NULL){
		if(!$orderby) $orderby = $this->configure_mod['content'][$type]['catsort_order'];
		$sql_order = $orderby?"ORDER BY $orderby":"";
		if($type>=0) $cond .=" AND c.type = ".intval($type);
		if($parentid>=0) $cond .= " AND c.parentid = ".intval($parentid);
		$sql = "SELECT * FROM ".$this->prefix."category c,".$this->prefix."category_ln ln WHERE c.active = 1 AND c.id = ln.id AND ln.ln = '".$this->setLang('content',$type,$this->configure_mod)."' AND $cond $sql_order ".($limit?" LIMIT $start,$limit":"");
		return $this->query($sql);
	}
	
	function view_cat($type = -1,$cond = 1,$start = 0,$limit = 0,$orderby = NULL){
		if(!$orderby) $orderby = $this->configure_mod['content'][$type]['catsort_order'];
		$sql_order = $orderby?"ORDER BY $orderby":"";
		
		$cond_type = 1;
		if(is_array($type)) $cond_type = "c.type IN (".implode(',',$type).")"; 
		elseif($type>=0) $cond_type = "c.type = ".intval($type);
		return $this->db->query("SELECT c.*,ln.* FROM ".$this->prefix."category c,".$this->prefix."category_ln ln WHERE c.active = 1 AND $cond_type AND c.id = ln.id AND ln.ln = '".$this->setLang('category',$type,$this->configure_mod)."' AND $cond $sql_order ".($limit?"LIMIT $start,$limit":""));
	}
	
	function get($id,$cond=1){
		$info = $this->info($id);
		$result = $this->db->query("SELECT * FROM ".$this->prefix."category c,".$this->prefix."category_ln ln WHERE c.active = 1 AND c.id = ln.id AND ln.ln = '".$this->setLang('content',$info['type'],$this->configure_mod)."' AND c.id = ".intval($id)." AND ".$cond);
		$data = $result->fetch();
		$result->cache();
		return $data;
	}
	
	function info($id){
		$result = $this->db->query("SELECT * FROM ".$this->prefix."category c WHERE c.id = ".intval($id));
		return $result->fetch();
	}
}

?>