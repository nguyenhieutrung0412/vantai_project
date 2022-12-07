<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

class ContentDao extends Model{
	var $configure_mod;
	function __construct($configure_mod){
		parent::__construct();
		$this->configure_mod = $configure_mod;
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
	

	function view_pagination($table,$cond = 1,$start = 0,$limit = 0,$orderby = NULL){

		return $this->db->query("SELECT * FROM ".$table." WHERE ".$cond." LIMIT $start,$limit");
	}

	function get($id  = 0){
		$info = $this->info($id);
		$result =  $this->db->query("SELECT c.*,ln.* FROM ".$this->prefix."content c,".$this->prefix."content_ln ln WHERE c.active = 1  AND c.id = ln.id AND ln.ln = '".$this->setLang('content',$info['type'],$this->configure_mod)."' AND c.id = ".intval($id));
		$data =  $result->fetch();
		$result->cache();
		return $data;
	}	
	
	function info($id  = 0){
		$result =  $this->db->query("SELECT c.* FROM ".$this->prefix."content c WHERE c.id = ".intval($id));
		return $result->fetch();
	}	
	
	function options($content_id = 0, $opt_type = 0){
		$cond = "co.content_id = ".intval($content_id);
		$cond .= " AND co.options_type = ".intval($opt_type);
		$result = $this->db->query("SELECT o.*,ln.* FROM ".$this->prefix."content_options co,".$this->prefix."options o,".$this->prefix."options_ln ln WHERE o.id = co.options_id AND o.id = ln.id AND ln.`ln` = '".$this->setLang('options',$opt_type,$this->configure_mod)."' AND $cond");
		$options = array();
		while($rs = $result->fetch()){
			$options[$rs['id']] = $rs;
		}
		return $options;
	}
	
	function view_table($table,$cond=1){
		return $this->db->query("SELECT * FROM $table WHERE $cond");
	}
}
?>