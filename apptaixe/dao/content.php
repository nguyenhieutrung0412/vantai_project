<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

class ContentDAO extends Model{
	var $configure_mod;
	function __construct(){
		parent::__construct();
		$this->configure_mod = $configure_mod;
	}
	function options($content_id = 0,$options_type = 0, $options_id = 0){
		$cond = 1;
		if($content_id) $cond .= " AND content_id = ".intval($content_id);
		if($options_type) $cond .= " AND content_id = ".intval($options_type);
		if($options_id) $cond .= " AND content_id = ".intval($options_id);
		return $this->db->query("SELECT * FROM ".$this->prefix."content_options WHERE $cond");
	}

	function view($type = -1,$cond = 1,$start = 0,$limit = 0,$orderby = NULL){
		if(!$orderby) $orderby = $this->configure_mod['content'][$type]['sort_order'];
		$sql_order = $orderby?"ORDER BY $orderby":"";
		//$sql_order = $orderby?"ORDER BY name":"";
		$cond_type = 1;
		if(is_array($type)) $cond_type = "c.type IN (".implode(',',$type).")"; 
		elseif($type>=0) $cond_type = "c.type = ".intval($type);
		return $this->db->query("SELECT c.*,ln.* FROM ".$this->prefix."content c,".$this->prefix."content_ln ln WHERE c.active = 1 AND $cond_type AND c.id = ln.id AND ln.ln = '".$this->setLang('content',$type,$this->configure_mod)."' AND $cond $sql_order".($limit?" LIMIT $start,$limit":""));
	}
	
	function view_mp3($type = -1,$cond = 1,$start = 0,$limit = 0,$orderby = NULL){
		if(!$orderby) $orderby = $this->configure_mod['content'][$type]['sort_order'];
		$sql_order = $orderby?"ORDER BY $orderby":"";
		//$sql_order = $orderby?"ORDER BY name":"";
		$cond_type = 1;
		if(is_array($type)) $cond_type = "c.type IN (".implode(',',$type).")"; 
		elseif($type>=0) $cond_type = "c.type = ".intval($type);
		return $this->db->query("SELECT c.*,ln.* FROM ".$this->prefix."content c,".$this->prefix."content_ln ln WHERE $cond_type AND c.id = ln.id AND ln.ln = '".$this->setLang('content',$type,$this->configure_mod)."' AND $cond $sql_order".($limit?" LIMIT $start,$limit":""));
	}
	
	function view_table($table,$cond=1){
		return $this->db->query("SELECT * FROM $table WHERE $cond");
	}

}