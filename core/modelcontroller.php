<?php
/**
 * @Name: MyCMS v2.0
 * @developer SWM
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2013 phpbasic
 */
defined('_ROOT') or die(__FILE__);
class modelController extends Model{
	
	function getModule($option=1){
		$getModule = $this->query("SELECT c.*, ln.* FROM ".$this->prefix."module c,".$this->prefix."module_ln ln WHERE c.id = ln.id AND c.active = 1 AND $option");
		return $getModule;
	}
	
	function langSetDefault($option){
		$langSetDefault = $this->query("SELECT $option FROM ".$this->prefix."language WHERE is_default = 1");
		$data = $langSetDefault->fetch($langSetDefault);
		return $data;
	}
	
	function listCodeLang(){
		$listCodeLang = $this->query("SELECT ln FROM ".$this->prefix."language WHERE active=1");
		$listLang = array();
		while($rs=$listCodeLang->fetch($listCodeLang)){
			$listLang[]= $rs['ln'];
		}
		return $listLang;
	}
	
	//hàm lấy ln theo category
	function getCateLang($name_seo){
		//$kt_cate = $this->db->query("SELECT * FROM ".$this->prefix."category_ln WHERE name_seo = '".$name_seo."' LIMIT 1");
		$kt_cate = $this->db->query("SELECT c.*,ln.* FROM ".$this->prefix."category c,".$this->prefix."category_ln ln WHERE c.id = ln.id AND c.active = 1 AND ln.name_seo = '".$name_seo."' LIMIT 1");
		$data = $kt_cate->fetch();
		
		//print_r($data);
		return $data;
	}
	
	//hàm lấy ln theo content
	function getContentLang($name_seo){
	
		$kt_content = $this->db->query("SELECT c.*,ln.* FROM ".$this->prefix."content c,".$this->prefix."content_ln ln WHERE c.id = ln.id AND c.active = 1 AND ln.name_seo = '".$name_seo."' LIMIT 1");
		$data = $kt_content->fetch();
		
		//print_r($data);
		return $data;
	}
	

}