<?php
/**
 * @Name: CaoBox v1.0
 * @author LinhNMT <w2ajax@gmail.com>
 * @link http://code.google.com/p/caobox/
 * @copyright Copyright &copy; 2009 phpbasic
 */
defined('_ROOT') or die(__FILE__);
//$_ = function(){
class DB extends bDataStore{
	var $connect;
	var $result;
	var $sql;
	var $data;
	var $cache;
	var $cachefile;
	
	//private vars
	var $num = 0;
	function __construct($server,$port,$user,$pass,$name,$prefix=NULL){
		$this->connect = parent::__construct($server,$port,$user,$pass,$name);
	}
	function cache(){
		$subdir = substr($this->cachefile,0,1).'/';
		$file = $this->cache.$subdir.$this->cachefile;
		if(!file_exists($this->cache.'sql_cache.txt')){
			@fopen($this->cache.'sql_cache.txt','w');
		}
		if($this->cache && !file_exists($file)){
			if(!is_dir($this->cache.$subdir)){
				@mkdir($this->cache.$subdir);
				@chmod($this->cache.$subdir);
			}
			$fp = @fopen($file,'w');
			if($fp){
				$str = '<?php'."\n";
				$str .'/* PHPBASIC Database Cache*/'."\n";
				$str .= "defined('_ROOT') or die('Not Allowed');\n";
				$str .= '$sql = "'.$this->sql.'";'."\n";
				$str .= '$num = "'.$this->num.'";'."\n";
				$str .= '$data = \''.addslashes(serialize($this->data)).'\';'."\n";
				$str .= '?>';
				fwrite($fp,$str);
				fclose($fp);
			}
		}
	}
	
	function checkcache(){
		$subdir = substr($this->cachefile,0,1).'/';
		return $this->cache && file_exists($this->cache.$subdir.$this->cachefile) && file_exists($this->cache.'sql_cache.txt') && filemtime($this->cache.$subdir.$this->cachefile) >= filemtime($this->cache.'sql_cache.txt');
	}
	
	function insert($table,$data = array()){
		foreach($data as $key=>$value) $data[$key] = addslashes($value);
		$sql = "INSERT INTO `".$table."`(`".implode('`,`',array_keys($data))."`) VALUES('".implode("','",$data)."')";
		return $this->query($sql);
	}
	function insert_ignore($table,$data = array()){
		foreach($data as $key=>$value) $data[$key] = addslashes($value);
		$sql = "INSERT IGNORE `".$table."`(`".implode('`,`',array_keys($data))."`) VALUES('".implode("','",$data)."')";
		return $this->query($sql);
	}
	function replace($table,$data = array()){
		foreach($data as $key=>$value) $data[$key] = addslashes($value);
		$sql = "REPLACE INTO `".$table."`(`".implode('`,`',array_keys($data))."`) VALUES('".implode("','",$data)."')";
		return $this->query($sql);
	}

	function update($table,$data = array(),$cond=0){
		$sql = "UPDATE `".$table."` SET ";
		foreach($data as $field=>$value) $sql .= "`$field`='".addslashes($value)."',";
		$sql = substr($sql,0,-1);
		$sql .=" WHERE $cond";
		return $this->query($sql);
	}
	
	function delete($table,$cond = 0){
		$sql = "DELETE FROM `".$table."` WHERE $cond";
		return $this->query($sql);
	}
		
	function query($sql,$start = 0,$limit = NULL){
		$this->data = array();
		$this->sql = $sql;
		$this->cachefile = md5($sql).'.php';
		$subdir = substr($this->cachefile,0,1).'/';
		if($this->checkcache()){
			include $this->cache.$subdir.$this->cachefile;
			$this->data = unserialize(stripslashes($data));
			$this->num = count($this->data);
		}else{
			if(file_exists($this->cache.$subdir.$this->cachefile)) @unlink($this->cache.$subdir.$this->cachefile);
			$this->result = parent::query($sql,$this->connect) or $this->error();
		}
		return $this;
	}
	
	function limit($sql,$start=0,$limit=0){
		return parent::limit($sql,$start,$limit);
	}
	
	function fetch($result=NULL){
		if($this->checkcache()){
			$idx = $this->num - count($this->data);
			$rs = NULL;
			if(isset($this->data[$idx])){
				$rs = $this->data[$idx];
				unset($this->data[$idx]);
			}
		}else{
			$rs =  parent::fetch($this->result);
			if($rs) $this->data[] = $rs;
		}
		return $rs;
	}
	
	function insert_id(){
		if($this->checkcache()){
			return 0;
		}else{
			return parent::insert_id($this->connect);
		}
	}
	
	function num_rows($result=NULL){
		$num = 0;
		if($this->checkcache()){
			$num = count($this->data);
		}else{
			$num =  parent::num_rows($this->result);
		}
		$this->num = $num;
		return $num;
	}
	
	function affected_rows(){
		return parent::affected_rows($this->connect);
	}
	
	function error(){
		$error = parent::error($this->connect);
		if($error['no']) $this->getError("Query: ".$this->sql."<br />".$error['msg']."");
	}
	
	function free($result){
		$this->data = array();
		parent::free($this->result);
	}
	
	//hàm lấy id cuối cùng của bản
	function lastid($table){
		$sql = $this->query("SHOW TABLE STATUS WHERE `Name` = '$table'");
		$data = $sql->fetch();
		return $data['Auto_increment'];
	}
	
	//hàm lấy chính xác id cuối cùng trong bảng nếu có dữ liệu
	function last_insetid($table){
		$sql = $this->query("SELECT id FROM ".$table." ORDER BY id DESC LIMIT 1");
		$data = $sql->fetch();
		return $data['id'];
	}
	
	function close(){
		parent::close($this->connect);
	}
}
/*};
@$_();
unset($_);*/