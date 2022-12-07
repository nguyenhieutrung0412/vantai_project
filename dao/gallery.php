<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

class GalleryDAO extends Model{
	var $configure_mod;
	function __construct($configure_mod){
		parent::__construct();
		$this->configure_mod = $configure_mod;
	}
	
	function view($page,$pageid,$start=0,$limit=0,$orderby="order_id,id"){
		return $this->db->query("SELECT * FROM ".$this->prefix."gallery WHERE active=1 AND page='".addslashes($page)."' AND pageid=".intval($pageid)." ORDER BY $orderby".($limit?" LIMIT $start,$limit":""));
	}
}

?>