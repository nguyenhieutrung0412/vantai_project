<?php
defined('_ROOT') or die(__FILE__);
class bDataStore extends CaoBox{
	var $conn;
	
	function __construct($dbhost,$dbport = '3306',$dbuser,$dbpass,$dbname){
		try {
		    $this->conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
				$this->conn->exec("set names utf8");
		    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		   	return $this->conn;
		}
		catch (PDOException $e) {
			  die(json_encode(array(
				 'no' => $e->getCode(),
				 'message' => $e->getMessage(),
				 'file' => $e->getFile(),
				 'line' => $e->getLine()
			 )));
		}
	}
	function query($sql){
		try{
      $sql = $this->conn->prepare($sql);
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			return $sql;
        }
        catch(PDOException $e){
			return $this->error_system($e->getCode(),$e->getMessage(),$e->getFile(),$e->getLine(),$e->getCode());
			 die(json_encode(array(
				 'no' => $e->getCode(),
				 'message' => $e->getMessage(),
				 'file' => $e->getFile(),
				 'line' => $e->getLine()
			 )));
         }
	}
	
	function num_rows($result){
		return $result->rowCount($result);
	}

	function fetch($result){
		return $result->fetch();	
	}
	function limit($sql, $start = 0,$limit = 0){
		return $sql. ($limit ? " LIMIT ".intval($start).",".intval($limit):"");
	}
	
	function free($result){
		do $result->fetchAll(); 
		while ($result->nextRowSet());
	}
	
	function insert_id(){
		try{
			$lastid = $this->conn->lastInsertId();
			return $lastid;
		 }catch(PDOException $e){
			  die(json_encode(array(
				 'no' => $e->getCode(),
				 'message' => $e->getMessage(),
				 'file' => $e->getFile(),
				 'line' => $e->getLine()
			 )));
         }
	}
	
	function error(){
		$error = array(
			'no' => $this->code,
			'msg'=> $this->msg,
		);
		return $error;
	}
	
	function close(){
		$this->conn = null;
	}
}