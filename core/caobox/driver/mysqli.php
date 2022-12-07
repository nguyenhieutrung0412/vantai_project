<?php
defined('_ROOT') or die(__FILE__);
class bDataStore extends CaoBox{
	var $conn;
	
	function __construct($dbhost,$dbport='3306',$dbuser,$dbpass,$dbname){
		$this->conn = mysqli_connect($dbhost,$dbuser,$dbpass) or $this->getError('Cannot connect to mysql: '.mysqli_connect_error());
		mysqli_select_db($this->conn,$dbname) or $this->getError("Cannot find $dbname: ".mysqli_connect_errno());
		mysqli_query($this->conn,"SET NAMES 'UTF8'");
		return $this->conn;
	}
	
	function query($sql){
		$sql = mysqli_query($this->conn,$sql);
		return $sql;
	}
	function insert_id(){
		$lastid =  mysqli_insert_id($this->conn);// or $this->getError($this->error($this->conn));
		return $lastid;
	}
	
	function num_rows($result){
		return  mysqli_num_rows($result);
	}
	
	function affected_rows(){
		return mysqli_affected_rows($this->conn);
	}
	
	function fetch($result){
		if($result){
			$rs = @mysqli_fetch_assoc($result);
			if(isset($rs)) return $rs; 
		}
	}
	
	function limit($sql, $start = 0,$limit = 0){
		return $sql. ($limit ? " LIMIT ".intval($start).",".intval($limit):"");
	}
	
	function free($result){
		mysqli_free_result($result);
	}
		
	function error(){
		$error = array(
			'no' => mysqli_errno($this->conn),
			'msg'=> mysqli_error($this->conn),
		);
		return $error;
	}
	
	function close(){
		mysqli_close($this->conn);
	}
}