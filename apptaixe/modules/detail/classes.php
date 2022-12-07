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
	function viewComments($id){
		return $this->db->query("SELECT * FROM ".$this->prefix."comment WHERE pageid = '".intval($id)."' AND reply_id = '0' AND active = '1' ORDER BY `timestamp` DESC");
	}
	
	function viewReply($pageid,$replyid,$cond=1){
		return $this->db->query("SELECT * FROM ".$this->prefix."comment WHERE pageid = '".intval($pageid)."' AND reply_id = '".intval($replyid)."' AND active = '1' AND $cond ORDER BY `timestamp` DESC");
	}
	
	function replyComments($data){
		return $this->db->insert($this->prefix."comment_reply",$data);
	}
	
	function viewAllComments($pageid,$cond=1){
		$sql = "SELECT * FROM ".$this->prefix."comment WHERE pageid = '".intval($pageid)."' AND reply_id = '0' AND active = '1' AND $cond ORDER BY `timestamp` DESC";
		return $this->query($sql);
	}
	
	function CountComments($pageid,$cond=1){
		return $this->db->query("SELECT * FROM ".$this->prefix."comment WHERE pageid = '".intval($pageid)."' AND active = 1 AND $cond");
	}
	
	function getCommentReply($reply_id){
		return $this->db->query("SELECT * FROM ".$this->prefix."comment WHERE id = '".intval($reply_id)."'");
	}
	function getReply($cond=1){
		return $this->db->query("SELECT * FROM ".$this->prefix."comment WHERE $cond");
	}
	function updateRating($id){
			return $this->db->query("UPDATE php_content_ln SET rating_value = 4.8, vote_number = 1 WHERE id = '".intval($id)."'");
			
	}
}
?>