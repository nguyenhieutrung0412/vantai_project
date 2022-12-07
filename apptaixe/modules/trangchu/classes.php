<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

class ClassModel extends MasterModel{
	function __construct(){
		parent::__construct();
	}
	function id_encode($id){
		$id_secutity_first = rand(1111111,9999999);
		$id_secutity_last = rand(1111111,9999999);
		$id_security =$id_secutity_first . $id .$id_secutity_last;
		return $id_security;
	}
	function id_decode($id_security){
		 $id = substr($id_security,7,-7);
		 return $id;
	}
}