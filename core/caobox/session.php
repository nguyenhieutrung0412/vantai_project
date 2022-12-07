<?php
//http://www.hackingwithphp.com/10/3/7/files-vs-databases
//https://bytes.com/topic/php/insights/889606-setting-timeout-php-sessions
//https://helpex.vn/question/lam-cach-nao-de-thay-doi-thoi-gian-cho-phien-trong-php--5cbd3f13ae03f6064c26c48a4

defined('_ROOT') or die(__FILE__);
class bSession extends CaoBox{
	var $timeout = 3600;//Number of seconds until it times out
	var $db;
	var $prefix;
	function __construct($db){
		$this->db = $db;
		$this->prefix = $db->prefix;
	}
	function load(){
		if(isset($_SESSION['timeout'])) {
			$duration = time() - (int)$_SESSION['timeout'];
			if($duration > $this->timeout){
					session_destroy();
					session_start();
			}
		}
		$_SESSION['timeout'] = time();
		session_start();
	}
}
$session = new bSession($model);
$session->load();