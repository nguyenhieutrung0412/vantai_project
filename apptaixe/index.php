<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
define('_ROOT',rtrim(dirname(dirname(__FILE__)),'/').'/');
define('_CORE',_ROOT);
define('_APP',_ROOT.'apptaixe/');
date_default_timezone_set('Asia/Ho_Chi_Minh');
$ini_session = ini_get('session.save_path');
include _CORE.'bootstrap.php';
//Controller 
	// argurment 1:  rewrite url ?
	// argument 2:  use mod rewrite ?
	// argument 3: multi language 
$controller = new Controller(false,false,false);
$controller->model = new Model;
$controller->model->db->query("SET NAMES 'UTF8'");
$controller->load();