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
	function insert($table,$data){
		return $this->db->insert($table,$data);
	}
	function update($table,$data,$cond){
		return $this->db->update($table,$data,$cond);
	}
	function delete($table,$cond){
		return $this->db->delete($table,$cond);
	}
	function getExtension($str){
		$i = strrpos($str,".");
		if (!$i) { return ""; }
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		$ext = substr($str,$i+1,$l);
		$ext = strtolower($ext);
		return $ext;
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
	function upload_files($type,$lastid){
		//update nhiều file vào thư mục
		$ext_file = array('pdf','doc','docx','xls','xlsx'); 
		$count_file = count($_FILES["pdf_file"]['name']);
		
		if($count_file > 0){
			for($i=0;$i<$count_file;$i++){
			
				$tmpFilePath = $_FILES['pdf_file']['tmp_name'][$i];
				$ext = getExtension($_FILES["pdf_file"]['name'][$i]);
				
				if($tmpFilePath != "" && in_array($ext,$ext_file)){
					$file = time().'-'.$lastid.'-'.str2url($_FILES['pdf_file']['name'][$i]);
					$newFilePath = "data/upload/files/" . $file;
					move_uploaded_file($tmpFilePath, $newFilePath);
					
					//insert data file
					//$title = $_FILES["pdf_file"]['name'][$i];
					//$file_name = $file;
					$file_type = $ext;
					
					$this->db->query("INSERT php_file (`type`,`type_id`,`file_name`,`file_type`) VALUES ('$type','$lastid','$file','$file_type')");
				}
			}
		}//END.upload file
	}
}