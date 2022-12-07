<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);
$cfg = array();
//databas configure
$cfg['driver'] 	= 'mysqli';
$cfg['server'] 	= 'localhost';
$cfg['port'] 		= '3306';

$cfg['usr'] 		= 'root';
$cfg['psw'] 		= '';
$cfg['name'] 		= 'vantai_data';


$cfg['prefix'] 		= 'php_';
//
$cfg['lang'] = 'vn';
$cfg['error_report'] = E_ALL & ~E_WARNING & ~E_NOTICE;
$cfg['error_display'] = false;
$cfg['server_var'] = 'REQUEST_URI';
$cfg['cache'] = false;
$cfg['gzip'] = true;
//
$core_ext[] = 'session';