<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);

class CaoBox{
	var $name = 'Hoa.Phin';
	var $version = '1.1';
	var $docs = 'hpmcontact@gmail.com';
	var $error_display = true;
	
	function __construct(){
		set_error_handler(array(&$this,'error_system'));
		error_reporting($GLOBALS['cfg']['error_report']);
		$this->error_display = $GLOBALS['cfg']['error_display'];
		
	}
	function __set($name, $value){
		$trace = debug_backtrace();
		$this->getError("Cannot setting value for \$$name to '$value'",$trace[0]['file'],$trace[0]['line']);
    }

    function __get($name){
        $trace = debug_backtrace();
		$this->getError("Cannot get value of varrible :\$$name",$trace[0]['file'],$trace[0]['line']);
    }
	function __call($name, $arguments) {
        $trace = debug_backtrace();
		$this->getError("Cannot use method :$name('".implode('\',\'',$arguments)."')",$trace[1]['file'],$trace[1]['line']);
    }
	
    /**  As of PHP 5.3.0  */
    public static function __callStatic($name, $arguments) {
        $trace = debug_backtrace();
		
		print_r($trace);
		$this->getError("Cannot use method :$name('".implode('\',\'',$arguments)."')",$trace[1]['file'],$trace[1]['line']);
    }	
	function help(){
		$const = get_defined_constants(true);
		
		ob_start();
		echo '<br />';
		echo '------------Constants: --------------------<br />';
		foreach($const['user'] as $key=>$name){
			echo "$key => $name<br />";
		}
	
		$method = get_class_methods($this);
		echo '<br />';
		echo '-------------Methods:      ---------------<br />';
		print_r($method);
		
		$include = get_included_files();
		echo '<br />';
		echo '-------------Include Files ---------------<br />';
		print_r($include);
		
		$header = getallheaders();
		echo '<br />';
		echo '-------------Header:       ---------------<br />';
		print_r($header);
		
		$msg = ob_get_contents();
		ob_end_clean();
		$this->getError($msg);
	}
	function getError($error_msg,$file = NULL,$line = NULL,$ctx =  NULL){
	 	$trace = debug_print_backtrace();
		$error_file = rtrim(dirname(__FILE__),'/').'/caobox/error.html';
		if(file_exists($error_file)) $error_skin = file_get_contents($error_file);
		else $error_skin  = '<title>'.$this->name.' '.$this->version.'</title><base href="http://phpbasic.com/"></base><pre>
	***********************************************************************************************************
	<u>General by</u>   : %s
	<u>Message</u>: <strong>%s</strong>
	<u>File</u>   : <strong>%s</strong>
	<u>Line</u>   : <strong>%d</strong>	
	***********************************************************************************************************	
	Document: '.$this->docs.'
	</pre>%s';
		if(!$file) $file = 'Undefined';
		printf($error_skin,$this->name.' '.$this->version,preg_replace('/href=\'(.*?)\'/','href="\\1.php"',$error_msg),$file,$line,$ctx);
		die();
	}

	// function getError($error_msg,$file = NULL,$line = NULL,$ctx =  NULL){
	// 	header("Location: htt...",301,true);
	// }


	function getAlert($msg,$file,$line){
		if($this->error_display) echo ' - '.$msg." in file <strong>$file</strong> online <strong>$line</strong> <br />";
	}
	function error_system($error_no,$error_msg,$file,$line,$ctx){
		$error_msg = preg_replace('/href=\'(.*?)\'/i','href="http://php.net/$1" target="_blank"',$error_msg);
		$error_code[E_WARNING] = '<strong>'.$this->name.' '.$this->version.' Warning:</strong> ';
		$error_code[E_NOTICE] = '<strong>'.$this->name.' '.$this->version.' Notice:</strong> ';
		if($error_no == E_WARNING || $error_no == E_NOTICE) $this->getAlert($error_code[$error_no].$error_msg,$file,$line,$ctx);
		else	$this->getError($error_msg,$file,$line,$ctx);
	}
}
?>